<?php

namespace App\Models;


class ProductCategory extends BaseModel
{
    protected $table = 'product_categories';

    protected $guarded = [];

    public function banners(){
        return $this->hasMany(ProductCategoryBanner::class,'product_category_id');
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