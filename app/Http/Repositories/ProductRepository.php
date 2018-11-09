<?php
namespace App\Http\Repositories;

use App\Libraries\Helpers;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductDesc;
use App\Models\ProductImage;
use App\Models\ProductPrice;
use App\Models\ProductSize;
use App\Models\ProductSKU;
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
    	$res = $this->model->orderBy("updated_at","DESC")->orderBy("priority","ASC")->get();
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
               'products.*'
            ])
            ->whereIn('products.product_category_id',$categoryList);
        $res = $query->get();
        if(!empty($res)){
            for($i=0; $i<count($res); $i++){
                $price = ProductPrice::where('product_id',$res[$i]->id)->orderBy('price')->first();
                $res[$i]->price = $price->price??0;
                $res[$i]->normal_price = $price->normal_price??0;
            }
        }
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
                    if(isset($data['sizes'])){
                        $sizeIns = [];
                        foreach ($data['sizes'] as $id){
                            $sizeIns[]=["product_id"=>$pro->id,"size_id"=>$id];
                        }
                        ProductSize::insert($sizeIns);
                    }
                    if(isset($data['colors'])){
                        $colorIns = [];
                        foreach ($data['colors'] as $id){
                            $colorIns[]=["product_id"=>$pro->id,"color_id"=>$id];
                        }
                        ProductColor::insert($colorIns);
                    }
                    if(isset($data['skus'])){
                        $skus = [];
                        foreach ($data['skus'] as $sku){
                            $isExist = false;
                            foreach ($skus as $v){
                                if($v['color_id'] == $sku['color_id'] && $v['size_id'] == $sku['size_id']){
                                    $isExist = true;
                                    break;
                                }
                            }
                            if(!$isExist){
                                $skus[]=[
                                    "product_id"=>$pro->id,
                                    "color_id"=>empty($sku['color_id'])?0:$sku['color_id'],
                                    "size_id"=>empty($sku['size_id'])?0:$sku['size_id'],
                                    "sku"=>$sku['sku']
                                ];
                            }
                        }
                        ProductSKU::insert($skus);
                    }
                    if(isset($data['prices'])){
                        $prices = [];
                        foreach ($data['prices'] as $item){
                            $isExist = false;
                            foreach ($prices as $v){
                                if($v['color_id'] == $item['color_id'] && $v['size_id'] == $item['size_id']){
                                    $isExist = true;
                                    break;
                                }
                            }
                            if(!$isExist){
                                $prices[]=[
                                    "product_id"=>$pro->id,
                                    "color_id"=>empty($item['color_id'])?0:$item['color_id'],
                                    "size_id"=>empty($item['size_id'])?0:$item['size_id'],
                                    "qty_from"=>$item['qty_form']??0,
                                    "qty_to"=>$item['qty_to']??0,
                                    "customer_group_id"=>$item['customer_group_id']??1,
                                    "import_price"=>$item['import_price'],
                                    "normal_price"=>$item['normal_price'],
                                    "price"=>$item['price']
                                ];
                            }
                        }
                        ProductPrice::insert($prices);
                    }
                    if(isset($data['attrs'])){
                        $attrs = [];
                        foreach ($data['attrs'] as $item){
                            $attrs[]=[
                                "product_id"=>$pro->id,
                                "name"=>$item['name']??"",
                                "desc"=>$item['desc']??"",
                            ];
                        }
                        ProductAttribute::insert($attrs);
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
            return ['message'=>'Product was created Unsuccessful','data'=>['error'=>$e->getMessage()." File ".$e->getFile()." line ".$e->getLine()],'status'=>false];
        }
    }
    public function updateProduct($id,$data,$files,$dataDel){
        try{
            DB::beginTransaction();
            $pro = Product::where('id',$id)->first();
            if($pro){
                if($data['product']){
                    Product::where('id',$id)->update($data['product']);
                    if($data['desc']){
                        ProductDesc::where('product_id',$id)->update($data['desc']);
                    }
                    if(isset($data['sizes'])){
                        $sizeIns = [];
                        ProductSize::where('product_id',$id)->delete();
                        foreach ($data['sizes'] as $sizeId){
                            $sizeIns[]=["product_id"=>$id,"size_id"=>$sizeId];
                        }
                        ProductSize::insert($sizeIns);
                    }
                    if(isset($data['colors'])){
                        $colorIns = [];
                        ProductColor::where('product_id',$id)->delete();
                        foreach ($data['colors'] as $colorId){
                            $colorIns[]=["product_id"=>$id,"color_id"=>$colorId];
                        }
                        ProductColor::insert($colorIns);
                    }
                    if(!empty($dataDel["skus"])){
                        ProductSKU::where('product_id',$id)->whereIn('id',$dataDel["skus"])->delete();
                    }
                    if(!empty($dataDel["prices"])){
                        ProductPrice::where('product_id',$id)->whereIn('id',$dataDel["prices"])->delete();
                    }
                    if(!empty($dataDel["attrs"])){
                        ProductAttribute::where('product_id',$id)->whereIn('id',$dataDel["attrs"])->delete();
                    }
                    if(!empty($data['skus'])){
                        $skus = [];
                        foreach ($data['skus'] as $sku){
                            $colorId = empty($sku['color_id']) ? 0 : $sku['color_id'];
                            $sizeId = empty($sku['size_id']) ? 0 : $sku['size_id'];
                            if($sku['id']){
                                $isExist = ProductSKU::where('product_id',$id)
                                    ->where('size_id',$sizeId)
                                    ->where('color_id',$colorId)
                                    ->count()>0;
                                if(!$isExist){
                                    ProductSKU::where('product_id',$id)->where('id',$sku['id'])->update([
                                        "color_id"=>$colorId,
                                        "size_id"=>$sizeId,
                                        "sku"=>$sku['sku']
                                    ]);
                                }
                            }
                            else{
                                $isExist = false;
                                foreach ($skus as $v){
                                    if($v['color_id'] == $sku['color_id'] && $v['size_id'] == $sku['size_id']){
                                        $isExist = true;
                                        break;
                                    }
                                }
                                if(!$isExist){
                                    $isExist = ProductSKU::where('product_id',$id)
                                        ->where('size_id',$sizeId)
                                        ->where('color_id',$colorId)
                                        ->count()>0;
                                    if(!$isExist){
                                        $skus[]=[
                                            "product_id"=>$pro->id,
                                            "color_id"=>$colorId,
                                            "size_id"=>$sizeId,
                                            "sku"=>$sku['sku']
                                        ];
                                    }
                                }
                            }
                        }
                        ProductSKU::insert($skus);
                    }
                    if(!empty($data['prices'])){
                        $prices = [];
                        foreach ($data['prices'] as $item){
                            $colorId = empty($item['color_id']) ? 0 : $item['color_id'];
                            $sizeId = empty($item['size_id']) ? 0 : $item['size_id'];
                            $qtyFrom = empty($item['qty_form']) ? 0 : $item['qty_form'];
                            $qtyTo = empty($item['qty_to']) ? 0 : $item['qty_to'];
                            $customerGroupId = empty($item['customer_group_id']) ? 1 : $item['customer_group_id'];
                            if($item['id']){
                                $isExist = ProductPrice::where('product_id',$id)
                                    ->where('color_id',$colorId)
                                    ->where('size_id',$sizeId)
                                    ->where('qty_from',$qtyFrom)
                                    ->where('qty_to',$qtyTo)
                                    ->where('customer_group_id',$customerGroupId)
                                    ->count()>1;
                                if($isExist){
                                    DB::rollBack();
                                    return ['message'=>'Price was Existed in DB (Price '.$item['price'].')','data'=>[],'status'=>false];
                                }
                                else{
                                    ProductPrice::where('product_id',$id)->where('id',$item['id'])->update([
                                        "color_id" => $colorId,
                                        "size_id" => $sizeId,
                                        "qty_from" => $qtyFrom,
                                        "qty_to" => $qtyTo,
                                        "customer_group_id" => $customerGroupId,
                                        "import_price" => $item['import_price'],
                                        "normal_price" => $item['normal_price'],
                                        "price" => $item['price']
                                    ]);
                                }
                            }
                            else {
                                $isExist = false;
                                foreach ($prices as $v) {
                                    if ($v['color_id'] == $item['color_id']
                                        && $v['size_id'] == $item['size_id']
                                    ) {
                                        $isExist = true;
                                        break;
                                    }
                                }
                                if(!$isExist){
                                    $isExist = ProductPrice::where('product_id',$id)
                                        ->where('color_id',$colorId)
                                        ->where('size_id',$sizeId)
                                        ->where('qty_from',$qtyFrom)
                                        ->where('qty_to',$qtyTo)
                                        ->where('customer_group_id',$customerGroupId)
                                        ->count()>0;
                                    if (!$isExist) {
                                        $prices[] = [
                                            "product_id" => $pro->id,
                                            "color_id" => $colorId,
                                            "size_id" => $sizeId,
                                            "qty_from" => $qtyFrom,
                                            "qty_to" => $qtyTo,
                                            "customer_group_id" => $customerGroupId,
                                            "import_price" => $item['import_price'],
                                            "normal_price" => $item['normal_price'],
                                            "price" => $item['price']
                                        ];
                                    }
                                }
                            }
                        }
                        ProductPrice::insert($prices);
                    }
                    if(!empty($data['attrs'])){
                        $attrs = [];
                        foreach ($data['attrs'] as $item){
                            if($item['id']){
                                ProductAttribute::where('product_id',$id)->where('id',$item['id'])->update([
                                    "name" => $item['name'] ?? "",
                                    "desc" => $item['desc'] ?? "",
                                ]);
                            }
                            else {
                                $attrs[] = [
                                    "product_id" => $pro->id,
                                    "name" => $item['name'] ?? "",
                                    "desc" => $item['desc'] ?? "",
                                ];
                            }
                        }
                        ProductAttribute::insert($attrs);
                    }
                    self::uploadProductImage($pro->id, $files,$dataDel['images']??[]);
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
            return ['message'=>'Product was updated Unsuccessful','data'=>['error'=>$e->getMessage()." File ".$e->getFile()." line ".$e->getLine()],'status'=>false];
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
//            $imgDel = explode(',',$imgDel);
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