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
        $result = Category::where('status',ENABLE)->orderBy('priority')->get()->toArray();
        return  $result;
    }
    public function getList($data){
        $res = $this->model;
        if(!empty($data->status)){
            $res = $res->where('categories.status',$data->status);
        }
        if(!empty($data->desc)){
            $res = $res->where('categories.desc','like','%'.trim($data->desc).'%');
        }
        if(!empty($data->name)){
            $res = $res->where('categories.name','like','%'.trim($data->name).'%');
        }
        $res = $res->select([
                'categories.*',
                DB::raw('pr.name as parent_name')
            ])
            ->leftJoin('categories as pr','pr.id','categories.parent_id')
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