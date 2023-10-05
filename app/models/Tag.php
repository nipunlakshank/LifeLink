<?php

/**
 * Tag model
 */

class Tag extends Model
{
    protected string $table = "tags";
    protected array $insert_columns = [
        'name',
    ];
    protected array $select_columns = [
        'id',
        'name',
    ];
}
