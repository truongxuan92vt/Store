<?php

namespace App\Models;

class ProductColor extends BaseModel
{
    protected $table = 'product_colors';
    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }
    protected $guarded = [];
}