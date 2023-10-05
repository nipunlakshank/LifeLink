<?php

/**
 * Vote model
 */

class Vote extends Model
{
    protected string $table = "posts";
    protected array $insert_columns = [
        'name',
    ];
    protected array $select_columns = [
        'id',
        'name',
    ];
}