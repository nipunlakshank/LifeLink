<?php

/**
 * PostCategory model
 */

class PostCategory extends Model
{
    protected string $table = "post_categories";
    protected array $insert_columns = [
        'name',
    ];
    protected array $select_columns = [
        'id',
        'name',
    ];
}
