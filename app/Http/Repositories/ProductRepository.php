<?php
namespace App\Http\Repositories;

use App\Libraries\Helpers;
use App\Models\Inventory;
use App\Models\ProductAttribute;
use App\Models\Category;
use App\Models\Product;
//use App\Models\ProductColor;
use App\Models\ProductDesc;
use App\Models\ProductImage;
use App\Models\ProductPrice;
//use App\Models\ProductSize;
use App\Models\ProductSKU;
use App\Models\ProductVariant;
use App\Models\Variant;
use App\Models\VariantValue;
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
                'name'=>$category->name,
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
               'products.*'
            ])
            ->whereIn('products.category_id',$categoryList);
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
                $skus = [];
                $prices = [];
                if($pro){
                    if($data['desc']){
                        $data['desc']['product_id'] = $pro->id;
                        ProductDesc::create($data['desc']);
                    }
                    if($data['variants']){
                        $numV = 1;
                        $arrV = [];
                        foreach ($data['variants'] as $variant){
                            if(count($variant['values'])>0){
                                $numV *= count($variant['values']);
                                $arrV[]= $variant['values'];
                            }
                        }
                        $res = [];
                        foreach ($arrV[0] as $v0){
                            if(!empty($arrV[1])){
                                foreach ($arrV[1] as $v1){
                                    if(!empty($arrV[2])){
                                        foreach ($arrV[2] as $v2){
                                            if(!empty($arrV[3])){
                                                foreach ($arrV[3] as $v3){
                                                    $res[]=[$v0,$v1,$v2,$v3];
                                                }
                                            }
                                            else{
                                                $res[]=[$v0,$v1,$v2];
                                            }
                                        }
                                    }
                                    else{
                                        $res[]=[$v0,$v1];
                                    }
                                }
                            }
                            else{
                                $res[]=[$v0];
                            }
                        }
                        $variants = [];
                        foreach ($res as $variant){
                            $sku = ProductSKU::create([
                                'product_id'=>$pro->id,
                                'sku'       =>self::generateSku(),
                                'status'    =>ENABLE
                            ]);

                            foreach ($variant as $v){
                                $variants[]= [
                                    'product_id'        =>$pro->id,
                                    'product_sku_id'    =>$sku->id,
                                    'variant_value_id'  =>$v,
                                    'status'            =>ENABLE
                                ];
                            }
                            $prices[]=[
                                'product_id'        =>$pro->id,
                                'product_sku_id'    =>$sku->id,
                                'status'            =>ENABLE
                            ];
                            $inventories[]=[
                                'product_id'        =>$pro->id,
                                'product_sku_id'    =>$sku->id,
                                'status'            =>ENABLE
                            ];
                        }
                        ProductVariant::insert($variants);
                        ProductPrice::insert($prices);
                        Inventory::insert($inventories);
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
            dd($e->getMessage());
            DB::rollBack();
            return ['message'=>'Product was created Unsuccessful','data'=>['error'=>$e->getMessage()." File ".$e->getFile()." line ".$e->getLine()],'status'=>false];
        }
    }
    public function getSkuOfProduct($productId){
        $skus = ProductSKU::select(
                ProductSKU::column('id'),
                ProductSKU::column('sku'),
                ProductSKU::column('product_id'),
                ProductSKU::column('upc'),
                ProductSKU::column('desc'),
                ProductSKU::column('status'),
                VariantValue::column('variant_id'),
                VariantValue::column('id')." as variant_value_id",
                VariantValue::column('code')." as variant_value_code",
                VariantValue::column('name')." as variant_value_name"
            )
            ->leftJoin(ProductVariant::table(),ProductVariant::column('product_sku_id'),ProductSKU::column('id'))
            ->leftJoin(VariantValue::table(),VariantValue::column('id'),ProductVariant::column('variant_value_id'))
            ->where(ProductSKU::column('product_id'),$productId)
            ->get();
        $res = [];
        foreach ($skus as $sku){
            $index = $sku->id;
            if(!isset($res[$index])){
                $res[$index]=[
                    'id'            =>$sku->id,
                    'sku'           =>$sku->sku,
                    'product_id'    =>$sku->product_id,
                    'upc'           =>$sku->upc,
                    'desc'          =>$sku->desc,
                    'status'        =>$sku->status,
                    'variant_values'=>[],
                    'variant_value_name'=>''
                ];
            }
            $res[$index]['variant_values'][]=[
                'variant_id'            => $sku->variant_id,
                'variant_value_id'      => $sku->variant_value_id,
                'variant_value_code'    => $sku->variant_value_code,
                'variant_value_name'    => $sku->variant_value_name,
            ];
            $comma = '';
            if(!empty($res[$index]['variant_value_name']))
                $comma = ', ';
            $res[$index]['variant_value_name'] .= $comma.$sku->variant_value_name;
        }
        return array_values($res);
    }
    public function getProductDetail($id){
        $product = Product::where('id',$id)->first();
        if(empty($product))
        {
            return null;
//            throw new \Exception("Product not found");
        }
        $product->skus = self::getSkuOfProduct($id);
        $variants = ProductVariant::select(
                ProductVariant::column('id'),
                ProductVariant::column('product_sku_id'),
                ProductVariant::column('variant_value_id'),
                VariantValue::column('code').' as variant_value_code',
                VariantValue::column('name').' as variant_value_name',
                Variant::column('id').' as variant_id',
                Variant::column('code').' as variant_code',
                Variant::column('name').' as variant_name'
            )
            ->leftJoin(VariantValue::table(),VariantValue::column('id'),ProductVariant::column('variant_value_id'))
            ->leftJoin(Variant::table(),Variant::column('id'),VariantValue::column('variant_id'))
            ->where('product_id',$id)
            ->get();
        $variantP = [];
        foreach($variants as $variant){
            $index = $variant->variant_id;
            if(!isset($variantP[$index])){
                $variantP[$index]=[
                    'product_sku_id'    =>$variant->product_sku_id,
                    'variant_id'        =>$variant->variant_id,
                    'variant_code'      =>$variant->variant_code,
                    'variant_name'      =>$variant->variant_name,
                    'values'            =>[]
                ];
            }
            if(!isset($variantP[$index]['values'][$variant->variant_value_id]))
                $variantP[$index]['values'][$variant->variant_value_id] =[
                    'variant_value_id'  =>$variant->variant_value_id,
                    'variant_value_code'=>$variant->variant_value_code,
                    'variant_value_name'=>$variant->variant_value_name,
                ];
        }
        $product->variants = $variantP;
        $product->prices = ProductPrice::where('product_id',$id)->get();
        $product->images = ProductImage::where('product_id',$id)->get();
        $product->inventories = Inventory::where('product_id',$id)->get();
        return $product;
    }
    public function generateSku(){
        $date = date('YmdHis');
        return $date;
    }
    public function updateProduct($id,$data,$files,$dataDel){
        try{
            DB::beginTransaction();
            $pro = Product::where('id',$id)->first();
            if($pro){
                if($data['product']){
                    Product::where('id',$id)->update($data['product']);
                    if($data['desc']){
                        if(ProductDesc::where('product_id',$id)->count()>0)
                        {
                            ProductDesc::where('product_id',$id)->update($data['desc']);
                        }
                        else{
                            ProductDesc::create(array_merge($data['desc'],['product_id'=>$id]));
                        }
                    }
                    if($data['prices']){
                        foreach ($data['prices'] as $row){
                            $priceUpdate = [
                                "customer_group_id" =>$row["customer_group_id"]??null,
                                "qty_from"          =>$row["qty_from"]??null,
                                "qty_to"            =>$row["qty_to"]??null,
                                "import_price"      =>$row["import_price"]??0,
                                "normal_price"      =>$row["normal_price"]??0,
                                "price"             =>$row["price"]??0,
                                "desc"              =>$row["desc"]??null,
                                "status"            =>$row["status"]??ENABLE,
                            ];
                            ProductPrice::where('id',$row['id'])->update($priceUpdate);
                        }
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
                    if(!empty($dataDel["attrs"])){
                        ProductAttribute::where('product_id',$id)->whereIn('id',$dataDel["attrs"])->delete();
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
                /*if(!empty($v['id']) && empty($v['file'])){
                    ProductImage::where('product_id',$id)->where('id',$v['id'])->update([
                        'priority'=>$v['priority']??null,
                        'product_sku_id'=>$v['product_sku_id']??null,
                    ]);
                }*/
                if(!empty($v['file'])){
                    $url = Helpers::uploadImage($v['file'],PATH_IMAGE_ITEM,$id.'_'.$k.'_');
                    if($url['status']){
                        if(!empty($v['id']))
                            ProductImage::where('product_id',$id)->where('id',$v['id'])->delete();
                        $urlFiles[]=[
                            'product_id'=>$id,
                            'product_sku_id'=>$v['product_sku_id'],
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
    public function getVariant(){
        return Variant::get();
    }
}