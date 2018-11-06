<?php

namespace App\Models;


use Illuminate\Support\Facades\URL;

class Size extends BaseModel
{
    protected $table = 'sizes';
    public function standard(){
        $this->belongsTo(SizeStandard::class,"size_standard_id");
    }
    protected $guarded = [];
}