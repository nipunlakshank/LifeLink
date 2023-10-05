<?php

/**
 * Post model
 */

class Post extends Model
{
    protected array $errors;
    protected string $table = "posts";
    protected array $insert_columns = [
        'fname',
        'lname',
        'email',
        'password',
    ];
    protected array $select_columns = [
        'iduser',
        'usercol_fname',
        'usercol_lname',
        'usercol_mobile',
        'usercol_email',
        'usercol_username',
        'usercol_dp_path',
        'role',
    ];
}