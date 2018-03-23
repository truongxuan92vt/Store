<?php

namespace App\Models;


class FunctionRole extends BaseModel
{
    protected $table = 'function_roles';

    protected $fillable = [
        'role_id',
        'function_id',
        'status'
    ];
}