<?php

/**
 * Votes Controller
 */


class Votes extends Controller
{

    public function add(): void
    {
        if($_SERVER['REQUEST_METHOD'] !== "POST") {
            exit;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $postVote = new PostVote();
        $insert_id = $postVote->update($data['posts_id'], []);

        if($insert_id < 1){
            exit(json_encode(["success" => false, "id" => $insert_id, "msg" => "Post insert error"]));
        }

        exit(json_encode(["success" => true, "id" => $insert_id]));
    }

    public function remove(): void
    {

    }

}
