<?php

namespace App\Models;


class Company extends BaseModel
{
    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'address_id',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];
}