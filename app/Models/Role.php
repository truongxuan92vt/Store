<?php

namespace App\Models;

class Role extends BaseModel
{
    protected $table = 'roles';

    protected $fillable = [
        'role_name',
        'status'
    ];
}