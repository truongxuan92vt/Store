<?php
namespace App\Http\Repositories;

use App\Libraries\Helpers;
use App\Models\Inventory;
use App\Models\ItemAttribute;
use App\Models\Category;
use App\Models\Item;
//use App\Models\ItemColor;
use App\Models\ItemDesc;
use App\Models\ItemImage;
use App\Models\ItemPrice;
//use App\Models\ItemSize;
use App\Models\ItemSKU;
use App\Models\ItemVariant;
use App\Models\Variant;
use App\Models\VariantValue;
use Illuminate\Support\Facades\DB;

class ItemRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return Item::class;
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

    public function getItemForHome(){
        $categoryNoChild = Category::where('parent_id',0)->get();
        $arrTop10 = [];
        foreach ($categoryNoChild as $category){
            $temp = [
                'name'=>$category->name,
                'category_id'=>$category->id,
                'items'=>[]
            ];
            $temp['items']=$this->model->where('category_id',$category->id)->get();
        }
        $query = $this->model;

        $res = $query->get();
        return $res;
    }
    public function getItemByCategory($categoryId){
        $categoryList = $this->getAllChildOfCategory($categoryId);
        $query = $this->model->select([
               'item.*'
            ])
            ->whereIn('item.category_id',$categoryList);
        $res = $query->get();
        if(!empty($res)){
            for($i=0; $i<count($res); $i++){
                $price = ItemPrice::where('item_id',$res[$i]->id)->orderBy('price')->first();
                $res[$i]->price = $price->price??0;
                $res[$i]->normal_price = $price->normal_price??0;
            }
        }
        return $res;
    }
    public function createItem($data,$files){
        try{
            DB::beginTransaction();
            if(isset($data['item'])){
                $pro = Item::create($data['item']);
                $skus = [];
                $prices = [];
                if($pro){
                    if($data['desc']){
                        $data['desc']['item_id'] = $pro->id;
                        ItemDesc::create($data['desc']);
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
                            $sku = ItemSKU::create([
                                'item_id'=>$pro->id,
                                'sku'       =>self::generateSku(),
                                'status'    =>ACTIVE
                            ]);

                            foreach ($variant as $v){
                                $variants[]= [
                                    'item_id'        =>$pro->id,
                                    'item_sku_id'    =>$sku->id,
                                    'variant_value_id'  =>$v,
                                    'status'            =>ACTIVE
                                ];
                            }
                            $prices[]=[
                                'item_id'        =>$pro->id,
                                'item_sku_id'    =>$sku->id,
                                'status'            =>ACTIVE
                            ];
                            $inventories[]=[
                                'item_id'        =>$pro->id,
                                'item_sku_id'    =>$sku->id,
                                'status'            =>ACTIVE
                            ];
                        }
                        ItemVariant::insert($variants);
                        ItemPrice::insert($prices);
                        Inventory::insert($inventories);
                    }

                    if(isset($data['attrs'])){
                        $attrs = [];
                        foreach ($data['attrs'] as $item){
                            $attrs[]=[
                                "item_id"=>$pro->id,
                                "name"=>$item['name']??"",
                                "desc"=>$item['desc']??"",
                            ];
                        }
                        ItemAttribute::insert($attrs);
                    }
                    if($files){
                        self::uploadItemImage($pro->id, $files);
                    }
                    DB::commit();
                    return ['message'=>'Item was created Successful','data'=>$pro,'status'=>true];
                }
            }else{
                DB::rollBack();
                return ['message'=>'Item was created Unsuccessful','data'=>[],'status'=>false];
            }
        }
        catch (\Exception $e){
            dd($e->getMessage());
            DB::rollBack();
            return ['message'=>'Item was created Unsuccessful','data'=>['error'=>$e->getMessage()." File ".$e->getFile()." line ".$e->getLine()],'status'=>false];
        }
    }
    public function getSkuOfItem($itemId){
        $skus = ItemSKU::select(
                ItemSKU::column('id'),
                ItemSKU::column('sku'),
                ItemSKU::column('item_id'),
                ItemSKU::column('upc'),
                ItemSKU::column('desc'),
                ItemSKU::column('status'),
                VariantValue::column('variant_id'),
                VariantValue::column('id')." as variant_value_id",
                VariantValue::column('code')." as variant_value_code",
                VariantValue::column('name')." as variant_value_name"
            )
            ->leftJoin(ItemVariant::table(),ItemVariant::column('item_sku_id'),ItemSKU::column('id'))
            ->leftJoin(VariantValue::table(),VariantValue::column('id'),ItemVariant::column('variant_value_id'))
            ->where(ItemSKU::column('item_id'),$itemId)
            ->get();
        $res = [];
        foreach ($skus as $sku){
            $index = $sku->id;
            if(!isset($res[$index])){
                $res[$index]=[
                    'id'            =>$sku->id,
                    'sku'           =>$sku->sku,
                    'item_id'    =>$sku->item_id,
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
    public function getItemDetail($id){
        $item = Item::where('id',$id)->first();
        if(empty($item))
        {
            return null;
//            throw new \Exception("Item not found");
        }
        $item->skus = self::getSkuOfItem($id);
        $variants = ItemVariant::select(
                ItemVariant::column('id'),
                ItemVariant::column('item_sku_id'),
                ItemVariant::column('variant_value_id'),
                VariantValue::column('code').' as variant_value_code',
                VariantValue::column('name').' as variant_value_name',
                Variant::column('id').' as variant_id',
                Variant::column('code').' as variant_code',
                Variant::column('name').' as variant_name'
            )
            ->leftJoin(VariantValue::table(),VariantValue::column('id'),ItemVariant::column('variant_value_id'))
            ->leftJoin(Variant::table(),Variant::column('id'),VariantValue::column('variant_id'))
            ->where('item_id',$id)
            ->get();
        $variantP = [];
        foreach($variants as $variant){
            $index = $variant->variant_id;
            if(!isset($variantP[$index])){
                $variantP[$index]=[
                    'item_sku_id'    =>$variant->item_sku_id,
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
        $item->variants = $variantP;
        $item->prices = ItemPrice::where('item_id',$id)->get();
        $item->images = ItemImage::where('item_id',$id)->get();
        $item->inventories = Inventory::where('item_id',$id)->get();
        return $item;
    }
    public function generateSku(){
        $date = date('YmdHis');
        return $date;
    }
    public function updateItem($id,$data,$files,$dataDel){
        try{
            DB::beginTransaction();
            $pro = Item::where('id',$id)->first();
            if($pro){
                if($data['item']){
                    Item::where('id',$id)->update($data['item']);
                    if($data['desc']){
                        if(ItemDesc::where('item_id',$id)->count()>0)
                        {
                            ItemDesc::where('item_id',$id)->update($data['desc']);
                        }
                        else{
                            ItemDesc::create(array_merge($data['desc'],['item_id'=>$id]));
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
                                "status"            =>$row["status"]??ACTIVE,
                            ];
                            ItemPrice::where('id',$row['id'])->update($priceUpdate);
                        }
                    }
                    if(!empty($data['attrs'])){
                        $attrs = [];
                        foreach ($data['attrs'] as $item){
                            if($item['id']){
                                ItemAttribute::where('item_id',$id)->where('id',$item['id'])->update([
                                    "name" => $item['name'] ?? "",
                                    "desc" => $item['desc'] ?? "",
                                ]);
                            }
                            else {
                                $attrs[] = [
                                    "item_id" => $pro->id,
                                    "name" => $item['name'] ?? "",
                                    "desc" => $item['desc'] ?? "",
                                ];
                            }
                        }
                        ItemAttribute::insert($attrs);
                    }
                    if(!empty($dataDel["attrs"])){
                        ItemAttribute::where('item_id',$id)->whereIn('id',$dataDel["attrs"])->delete();
                    }
                    self::uploadItemImage($pro->id, $files,$dataDel['images']??[]);
                    DB::commit();
                    return ['message'=>'Item was updated Successful','data'=>$pro,'status'=>true];
                }
                else{
                    DB::rollBack();
                    return ['message'=>'Update Error','data'=>[],'status'=>false];
                }
            }
            else{
                DB::rollBack();
                return ['message'=>'Item does not exist','data'=>[],'status'=>false];
            }
        }
        catch (\Exception $e){
            DB::rollBack();
            return ['message'=>'Item was updated Unsuccessful','data'=>['error'=>$e->getMessage()." File ".$e->getFile()." line ".$e->getLine()],'status'=>false];
        }
    }
    public function uploadItemImage($id,$files,$imgDel=[]){
        $urlFiles = [];
        if($files){
            foreach ($files as $k=>$v){
                /*if(!empty($v['id']) && empty($v['file'])){
                    ItemImage::where('item_id',$id)->where('id',$v['id'])->update([
                        'priority'=>$v['priority']??null,
                        'item_sku_id'=>$v['item_sku_id']??null,
                    ]);
                }*/
                if(!empty($v['file'])){
                    $url = Helpers::uploadImage($v['file'],PATH_IMAGE_ITEM,$id.'_'.$k.'_');
                    if($url['status']){
                        if(!empty($v['id']))
                            ItemImage::where('item_id',$id)->where('id',$v['id'])->delete();
                        $urlFiles[]=[
                            'item_id'=>$id,
                            'item_sku_id'=>$v['item_sku_id'],
                            'url'=>$url['url'],
                            'status'=>ACTIVE,
                            'priority'=>$v['priority']??0
                        ];
                    }
                }
            }
        }
        if(!empty($imgDel)){
//            $imgDel = explode(',',$imgDel);
            foreach ($imgDel as $v){
                $image = ItemImage::where('item_id',$id)->where('id',$v)->first();
                try{
                    if($image){
                        ItemImage::where('item_id',$id)->where('id',$v)->delete();
                        unlink('../public'.$image['url']);
                    }
                }
                catch (\Exception $e){}
            }
        }
        if(count($urlFiles)>0){
            ItemImage::insert($urlFiles);
        }
    }
    public function getVariant(){
        return Variant::get();
    }
}