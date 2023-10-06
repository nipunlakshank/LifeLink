<?php

/**
 * Post model
 */

class Post extends Model
{
    protected string $table = "posts";
    protected array $insert_columns = [
        'title',
        'description',
        'location',
        'users_id',
        'post_categories_id',
        'post_types_id',
    ];
    protected array $select_columns = [
        'id',
        'title',
        'description',
        'location',
        'users_id',
        'post_categories_id',
        'post_types_id',
        'created_at',
        'updated_at',
    ];

    public function getPosts(): array
    {
        $posts = $this->selectAll();
        if (empty($posts)) {
            return [];
        }

        foreach ($posts as $post) {
            $comment = new Comment();
            $comments = $comment->select(["posts_id" => $post->id]);

            $user = new User();
            foreach ($comments as $comm) {
                $commented_user = $user->selectOne(["id" => $comm->users_id]);
                $comm->username = $commented_user->username;
                $comm->name = "$commented_user->fname $commented_user->lname";
                $comm->img = $commented_user->img;
                $comm->time_diff = $this->getTime($comm->created_at);
            }

            $posted_user = $user->selectOne(["id" => $post->users_id]);
            $post->name = "$posted_user->fname $posted_user->lname";
            $post->username = $posted_user->username;

            $post->time_diff = $this->getTime($post->created_at);
            $post->comments = $comments;

            $postType = new PostType();
            $post->type = $postType->select(["id" => $post->post_types_id]);

            $postCategory = new PostCategory();
            $post->category = $postCategory->select(["id" => $post->post_categories_id]);

            $postVote = new PostVote();
            $votes = $postVote->selectOne(["posts_id" => $post->id, "users_id" => $post->users_id]) ?? [];
            $vote = new Vote();

            $upvotes = 0;
            $downvotes = 0;

            foreach($votes as $v){
                $v_name = $vote->selectOne(["id" => $v->id])?->name;
                if(strtolower($v_name) === "upvote"){
                    $upvotes += 1;
                }else if(strtolower(($v_name) === "downvote")){
                    $downvotes += 1;
                }
            }

            $post->upvotes = $upvotes;
            $post->downvotes = $downvotes;

            $user_vote = $postVote->selectOne(["posts_id" => $post->id, "users_id" => Auth::getId()]);
            if(!empty($user_vote)){
                $vote_id = $user_vote->votes_id;
                $vote_name = $vote->selectOne(["id" => $vote_id]);
                $post->vote = $vote_name->name;
            }

        }
        return $posts;
    }

    private function getTime($date_string): string
    {
        $time_diff = "";
        $userLastActivity = new DateTime($date_string, new DateTimeZone("Asia/Colombo"));
        $currentTimestamp = new DateTime("now", new DateTimeZone("Asia/Colombo"));
        $timeDifference = $currentTimestamp->diff($userLastActivity);

        if ($timeDifference->y > 0) {
            $time_diff = $userLastActivity->format("d/m/Y");
        } elseif ($timeDifference->days === 1 && $timeDifference->h < 24) {
            $time_diff = "yesterday";
        } elseif ($timeDifference->days === 0) {
            if ($timeDifference->h > 0) {
                $time_diff = $userLastActivity->format(" H:i");
            } elseif ($timeDifference->i > 0) {
                $time_diff = $timeDifference->i == 1 ? "1min ago" : $timeDifference->i . "min ago";
            } else {
                $time_diff = "Now";
            }
        } else {
            $time_diff = $userLastActivity->format("d/m/Y");
        }

        return $time_diff;
    }
}
