<?php

namespace App\Models;

class CodeDetail extends BaseModel
{
    protected $table = 'code_details';

    protected $fillable = [
        'code',
        'name',
        'group_code',
        'group_name',
        'status'
    ];
}