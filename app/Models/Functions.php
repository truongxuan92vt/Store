<?php

namespace App\Models;


class Functions extends BaseModel
{
    protected $table = 'functions';

    protected $fillable = [
        'name',
        'parent_id',
        'controller',
        'url',
        'icon',
        'status'
    ];
}