<?php

namespace App\Models;


use Illuminate\Support\Facades\URL;

class Product extends BaseModel
{
    protected $table = 'products';

    protected $guarded = [];
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id')->orderBy('priority');
    }
    public function desc(){
        return $this->hasOne(ProductDesc::class,'product_id');
    }
    public function skus(){
        return $this->hasMany(ProductSKU::class,'product_id');
    }
    public function info(){
        return $this->hasone(ProductInfo::class,'product_id');
    }
    public function prices(){
        return $this->hasMany(ProductPrice::class,'product_id');
    }
    public function attrs(){
        return $this->hasMany(ProductAttribute::class,'product_id');
    }
    public function inventories(){
        return $this->hasMany(Inventory::class,'product_id');
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