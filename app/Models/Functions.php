<?php

namespace App\Models;


class Functions extends BaseModel
{
    protected $table = 'function';

    protected $fillable = [
        'name',
        'parent_id',
        'controller',
        'url',
        'icon',
        'status'
    ];
}