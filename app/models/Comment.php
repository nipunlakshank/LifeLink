<?php

/**
 * Comment model
 */

class Comment extends Model
{
    protected string $table = "comments";
    protected array $insert_columns = [
        'comment',
        'users_id',
        'posts_id',
    ];
    protected array $select_columns = [
        'id',
        'comment',
        'users_id',
        'posts_id',
        'created_at',
        'updated_at',
    ];
}
