<?php

namespace App\Models;

class Role extends BaseModel
{
    protected $table = 'role';

    protected $fillable = [
        'name',
        'status'
    ];
}