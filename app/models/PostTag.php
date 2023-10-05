<?php

/**
 * PostTag model
 */

class PostTag extends Model
{
    protected string $table = "posts_has_tags";
    protected array $insert_columns = [
        'posts_id',
        'tags_id',
    ];
    protected array $select_columns = [
        'id',
        'posts_id',
        'tags_id',
    ];
}
