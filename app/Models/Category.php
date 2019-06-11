<?php

namespace App\Models;


class Category extends BaseModel
{
    protected $table = 'categories';

    protected $guarded = [];

    public function banners(){
        return $this->hasMany(CategoryBanner::class,'category_id');
    }
   /* protected $fillable = [
        'name',
        'parent_id',
        'note',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];*/
}