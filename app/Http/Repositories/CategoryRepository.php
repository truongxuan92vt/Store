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
        $query = Category::where('status',ACTIVE)->select([
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
        $result = Category::where('status',ACTIVE)->orderBy('priority')->get()->toArray();
        return  $result;
    }
    public function getList($data){
        $res = $this->model;
        if(!empty($data->status)){
            $res = $res->where('category.status',$data->status);
        }
        if(!empty($data->desc)){
            $res = $res->where('category.desc','like','%'.trim($data->desc).'%');
        }
        if(!empty($data->name)){
            $res = $res->where('category.name','like','%'.trim($data->name).'%');
        }
        $res = $res->select([
                'category.*',
                DB::raw('pr.name as parent_name')
            ])
            ->leftJoin('category as pr','pr.id','category.parent_id')
            ->orderBy('priority','ASC')
            ->orderBy('parent_id','ASC')
            ->orderBy('name','ASC')
            ->get();
        return $res;
    }
    static public function getOption($data=null){
        $res = Category::select('id','name')->get()->toArray();
        return $res;
    }
}