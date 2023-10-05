<?php

/**
 * PostVote model
 */

class PostVote extends Model
{
    protected string $table = "posts_has_votes";
    protected array $insert_columns = [
        'posts_id',
        'votes_id',
        'users_id',
    ];
    protected array $select_columns = [
        'id',
        'posts_id',
        'votes_id',
        'users_id',
    ];
}
