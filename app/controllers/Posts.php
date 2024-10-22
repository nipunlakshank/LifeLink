<?php

/**
 * Posts Controller
 */


class Posts extends Controller
{
    protected string $title = "Posts";

    public function add(): void
    {
        if($_SERVER['REQUEST_METHOD'] !== "POST") {
            exit;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        // $data["description"] = esc($data["description"]);
        $post = new Post();
        $insert_id = $post->insert($data);

        if($insert_id < 1){
            exit(json_encode(["success" => false, "id" => $insert_id, "msg" => "Post insert error"]));
        }

        exit(json_encode(["success" => true, "id" => $insert_id]));
    }

}
