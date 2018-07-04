<?php

namespace App\Models;


use Illuminate\Support\Facades\URL;

class Item extends BaseModel
{
    protected $table = 'items';

    protected $guarded = [];

    public function images(){
        return $this->hasMany(ItemImage::class,'item_id');
    }

    public static function boot(){
        static::retrieved(function ($model) {
            $server = config('app.server_upload');
            if(empty($server)){
                $server = URL::to('/');
            }
            if(!empty($model->image))
                $model->image = $server.$model->image;
        });
    }
}