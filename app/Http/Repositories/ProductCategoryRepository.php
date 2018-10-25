<?php
namespace App\Http\Repositories;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class ProductCategoryRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return ProductCategory::class;
    }
    public function getCategoryOption($data){
        $query = ProductCategory::where('status',ENABLE)->select([
            'id',
            'name as text',
            'parent_id'
        ]);
        if(!empty($data['except_id'])){
            $query->where('id','<>',$data['except_id']);
        }
        $res = $query->get()->toArray();
        return  $res;
    }
    public static function getCategoryForWeb(){
        $result = ProductCategory::where('status',ENABLE)->orderBy('priority')->get()->toArray();
        return  $result;
    }
    public function getList($data){
        $res = $this->model;
        if(!empty($data->status)){
            $res = $res->where('product_categories.status',$data->status);
        }
        if(!empty($data->desc)){
            $res = $res->where('product_categories.desc','like','%'.trim($data->desc).'%');
        }
        if(!empty($data->name)){
            $res = $res->where('product_categories.name','like','%'.trim($data->name).'%');
        }
        $res = $res->select([
                'product_categories.*',
                DB::raw('pr.name as parent_name')
            ])
            ->leftJoin('product_categories as pr','pr.id','product_categories.parent_id')
            ->orderBy('priority','ASC')
            ->orderBy('parent_id','ASC')
            ->orderBy('name','ASC')
            ->get();
        return $res;
    }
    static public function getOption($data=null){
        $res = ProductCategory::select('id','name')->get()->toArray();
        return $res;
    }
}