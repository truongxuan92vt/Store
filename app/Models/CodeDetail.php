<?php

namespace App\Models;

class CodeDetail extends BaseModel
{
    protected $table = 'code_details';

    protected $fillable = [
        'cm_code',
        'cm_name'
    ];
}