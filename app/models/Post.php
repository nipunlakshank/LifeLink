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
}