<?php

namespace App\Models;

class ProductSize extends BaseModel
{
    protected $table = 'product_sizes';
    public function size(){
        return $this->belongsTo(Size::class,'size_id');
    }
    public function fullName(){
        if($this->size->size_standard_id){
            $std = SizeStandard::where('id',$this->size->size_standard_id)->first();
            if($std){
                return $std->name."-".$std->gender."-".$this->size->name;
            }
        }
        return $this->size->name;
    }
    protected $guarded = [];
}