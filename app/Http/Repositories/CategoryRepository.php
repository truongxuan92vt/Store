<?php
namespace App\Http\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

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
    public function getCategoryOption($data){
        $query = Category::where('status',ENABLE)->select([
            'id',
            'category_name as text',
            'parent_id'
        ]);
        if(!empty($data['except_id'])){
            $query->where('id','<>',$data['except_id']);
        }
        $res = $query->get()->toArray();
        return  $res;
    }
    public static function getCategoryForWeb(){
        $result = Category::where('status',ENABLE)->orderBy('priority')->get()->toArray();
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
        $res = $res->select([
                'categories.*',
                DB::raw('pr.category_name as parent_name')
            ])
            ->leftJoin('categories as pr','pr.id','categories.parent_id')
            ->orderBy('priority','ASC')
            ->orderBy('parent_id','ASC')
            ->orderBy('category_name','ASC')
            ->get();
        return $res;
    }
    static public function getOption($data=null){
        $res = Category::select('id','category_name')->get()->toArray();
        return $res;
    }
}