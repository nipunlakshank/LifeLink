<?php

/**
 * PostType model
 */

class PostType extends Model
{
    protected string $table = "post_types";
    protected array $insert_columns = [
        'name',
    ];
    protected array $select_columns = [
        'id',
        'name',
    ];
}
