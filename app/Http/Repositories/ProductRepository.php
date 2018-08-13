<?php
namespace App\Http\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return Product::class;
    }
    public function getList($data = null){
    	$res = $this->model->get();
    	return $res;
    }
    public function getChildCategory(&$res,$data,$id=0){
        foreach ($data as $k=>$v){
            if($v['parent_id'] == $id){
                $res[]=$v['id'];
                self::getChildCategory($res,$data,$v['id']);
                unset($data[$k]);
            }
        }

    }
    public function getAllChildOfCategory($id){
        $category = Category::get()->toArray();
        $res = [(int)$id];
        self::getChildCategory($res,$category,$id);
        return $res;
    }

    public function getProductForHome(){
        $categoryNoChild = Category::where('parent_id',0)->get();
        $arrTop10 = [];
        foreach ($categoryNoChild as $category){
            $temp = [
                'category_name'=>$category->category_name,
                'category_id'=>$category->id,
                'products'=>[]
            ];
            $temp['products']=$this->model->where('category_id',$category->id)->get();
        }
        $query = $this->model;

        $res = $query->get();
        return $res;
    }
    public function getProductByCategory($categoryId){
        $categoryList = $this->getAllChildOfCategory($categoryId);
        $query = $this->model->select([
               '*'
            ])
            ->whereIn('category_id',$categoryList);
        $res = $query->get();
        return $res;
    }
}