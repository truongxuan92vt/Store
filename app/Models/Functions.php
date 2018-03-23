<?php

namespace App\Models;


class Functions extends BaseModel
{
    protected $table = 'functions';

    protected $fillable = [
        'function_name',
        'parent_id',
        'controller',
        'url',
        'icon',
        'status'
    ];
}