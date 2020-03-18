<?php

namespace App\Models;


use Illuminate\Support\Facades\URL;

class Item extends BaseModel
{
    protected $table = 'item';

    protected $guarded = [];
    public function images(){
        return $this->hasMany(ItemImage::class,'item_id')->orderBy('priority');
    }
    public function desc(){
        return $this->hasOne(ItemDesc::class,'item_id');
    }
    public function skus(){
        return $this->hasMany(ItemSKU::class,'item_id');
    }
    public function info(){
        return $this->hasone(ItemInfo::class,'item_id');
    }
    public function prices(){
        return $this->hasMany(ItemPrice::class,'item_id');
    }
    public function attrs(){
        return $this->hasMany(ItemAttribute::class,'item_id');
    }
    public function inventories(){
        return $this->hasMany(Inventory::class,'item_id');
    }
//    public static function boot(){
//        static::retrieved(function ($model) {
//            $server = config('app.server_upload');
////            if(empty($server)){
////                $server = URL::to('/');
////            }
//            if(!empty($model->image))
//                $model->image = $server.$model->image;
//        });
//    }
}