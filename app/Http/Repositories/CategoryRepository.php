<?php
namespace App\Http\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return Category::class;
    }
    public static function getCategoryForWeb(){
        $result = Category::get();
        return  $result;
    }
    public function getList($data){
        $res = $this->model;
        if(!empty($data->status)){
            $res = $res->where('status',$data->status);
        }
        if(!empty($data->note)){
            $res = $res->where('note','like','%'.$data->note.'%');
        }
        if(!empty($data->category_name)){
            $res = $res->where('category_name','like','%'.$data->category_name.'%');
        }
        $res = $res->get();
        return $res;
    }
    static public function getOption($data=null){
        $res = Category::select('id','category_name')->get()->toArray();
        return $res;
    }
}