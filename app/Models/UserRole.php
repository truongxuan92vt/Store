<?php

namespace App\Models;


class UserRole extends BaseModel
{
    protected $table = 'user_roles';

    protected $fillable = [
        'user_id',
        'role_id'
    ];
}