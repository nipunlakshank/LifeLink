<?php

/**
 * Users Controller
 */

class Users extends Controller
{

    public function update(): void
    {
        if($_SERVER['REQUEST_METHOD'] !== "POST"){
            exit(json_encode(['success' => false]));
        }

        $data = json_decode(file_get_contents("php://input"), true);
        $user = new User();

        $update_cols = $data;
        unset($update_cols['id']);
        $user->update($data['id'], $update_cols, array_keys($update_cols));
        $updated_user = $user->selectOne(["id" => $data["id"]]);
        $updated_user->success = true;
        exit(json_encode($updated_user));
    }
}
