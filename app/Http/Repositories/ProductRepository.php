<?php
namespace App\Http\Repositories;

use App\Libraries\Helpers;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductDesc;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

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
        $category = ProductCategory::get()->toArray();
        $res = [(int)$id];
        self::getChildCategory($res,$category,$id);
        return $res;
    }

    public function getProductForHome(){
        $categoryNoChild = ProductCategory::where('parent_id',0)->get();
        $arrTop10 = [];
        foreach ($categoryNoChild as $category){
            $temp = [
                'name'=>$category->name,
                'product_category_id'=>$category->id,
                'products'=>[]
            ];
            $temp['products']=$this->model->where('product_category_id',$category->id)->get();
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
            ->whereIn('product_category_id',$categoryList);
        $res = $query->get();
        return $res;
    }
    public function createProduct($data,$files){
        try{
            DB::beginTransaction();
            if(isset($data['product'])){
                $pro = Product::create($data['product']);
                if($pro){
                    if($data['desc']){
                        $data['desc']['product_id'] = $pro->id;
                        ProductDesc::create($data['desc']);
                    }
                    if($files){
                        self::uploadProductImage($pro->id, $files);
                    }
                    DB::commit();
                    return ['message'=>'Product was created Successful','data'=>$pro,'status'=>true];
                }
            }else{
                DB::rollBack();
                return ['message'=>'Product was created Unsuccessful','data'=>[],'status'=>false];
            }
        }
        catch (\Exception $e){
            DB::rollBack();
            return ['message'=>'Product was created Unsuccessful','data'=>['error'=>$e->getMessage()],'status'=>false];
        }
    }
    public function updateProduct($id,$data,$files,$imgDel){
        try{
            DB::beginTransaction();
            $pro = Product::where('id',$id)->first();
            if($pro){
                if($data['product']){
                    Product::where('id',$id)->update($data['product']);
                    if($data['desc']){
                        ProductDesc::where('product_id',$id)->update($data['desc']);
                    }
                    self::uploadProductImage($pro->id, $files,$imgDel);
                    DB::commit();
                    return ['message'=>'Product was updated Successful','data'=>$pro,'status'=>true];
                }
                else{
                    DB::rollBack();
                    return ['message'=>'Update Error','data'=>[],'status'=>false];
                }
            }
            else{
                DB::rollBack();
                return ['message'=>'Product does not exist','data'=>[],'status'=>false];
            }
        }
        catch (\Exception $e){
            DB::rollBack();
            return ['message'=>'Product was updated Unsuccessful','data'=>['error'=>$e->getMessage()],'status'=>false];
        }
    }
    public function uploadProductImage($id,$files,$imgDel=[]){
        $urlFiles = [];
        if($files){
            foreach ($files as $k=>$v){
                if(!empty($v['id']) && empty($v['file'])){
                    ProductImage::where('product_id',$id)->where('id',$v['id'])->update([
                        'priority'=>$v['priority']??null,
                        'size_id'=>$v['size_id']??null,
                        'color_id'=>$v['color_id']??null
                    ]);
                }
                if(!empty($v['file'])){
                    $url = Helpers::uploadImage($v['file'],PATH_IMAGE_ITEM,$id.'_'.$k.'_');
                    if($url['status']){
                        if(!empty($v['id']))
                            ProductImage::where('product_id',$id)->where('id',$v['id'])->delete();
                        $urlFiles[]=[
                            'product_id'=>$id,
                            'url'=>$url['url'],
                            'status'=>ENABLE,
                            'priority'=>$v['priority']??0
                        ];
                    }
                }
            }
        }
        if(!empty($imgDel)){
            $imgDel = explode(',',$imgDel);
            foreach ($imgDel as $v){
                $image = ProductImage::where('product_id',$id)->where('id',$v)->first();
                try{
                    if($image){
                        ProductImage::where('product_id',$id)->where('id',$v)->delete();
                        unlink('../public'.$image['url']);
                    }
                }
                catch (\Exception $e){}
            }
        }
        if(count($urlFiles)>0){
            ProductImage::insert($urlFiles);
        }
    }
}