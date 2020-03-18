<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\ColorRepository;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\VariantRepository;
use App\Libraries\Helpers;
use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use App\Http\Repositories\ItemRepository;

class ItemController extends BaseController {
    public function __construct(Request $_request,ItemRepository $_repos)
    {
        parent::__construct($_request);
        $this->repos = $_repos;
    }
    protected $rules=[
        'name'=>'required',
        'category_id'=>'required',
        'status'=>'required',
    ];
    public function index(){
        $category = CategoryRepository::getOption();
        return view('admins.items.index',['category'=>$category,'statusList'=>Helpers::convertCombo(STATUS_SYS)]);
    }
    public function detail(){
        $id = $this->request->id??null;
        $category = CategoryRepository::getOption();
        $item = $this->repos->getItemDetail($id);
//        dd(json_encode($item));
        return view('admins.items.detail',[
            'data'=>$item,
            'category'=>$category,
            'statusList'=>Helpers::convertCombo(STATUS_SYS)]
        );
    }
    public function list(){
        $data = $this->request;
        $res = $this->repos->getList($data);
        return $this->respondForward(['status'=>true,'data'=>$res,'message'=>'']);
    }
    public function save(){
        $res = ['message'=>'Item was updated successful','data'=>[],'status'=>true];
        $req = $this->request->all();
        $id = $this->request->id??null;
        $name = $this->request->get('name');
        $categoryId = $this->request->get('category_id');
        $status = $this->request->get('status');
        $shortDesc = $this->request->get('short_desc');
        $longDesc = $this->request->get('long_desc');
        $imgDel = $this->request->get('imgDel');
        $priceDel = $this->request->get('priceDel');
        $skuDel = $this->request->get('skuDel');
        $attrDel = $this->request->get('attrDel');
        $files = $this->request->t_pro_image;
        $skus = $this->request->t_pro_sku??null;
        $info = $this->request->t_pro_infor??null;
        $prices = $this->request->t_pro_price??null;
        $attrs = $this->request->t_pro_attr??null;
        $variants = $this->request->t_pro_variant??null;
        unset($files['--row--']);
        if($skus!=null){
            unset($skus['--row--']);
        }
        if($info!=null){
            unset($info['--row--']);
        }
        if($prices!=null){
            unset($prices['--row--']);
        }
        if($attrs!=null){
            unset($attrs['--row--']);
        }
        if($variants!=null){
            unset($variants['--row--']);
        }
        /*if($this->request->hasFile('image')){
            $image = Helpers::uploadImage($this->request->file('image'),PATH_IMAGE_ITEM,$id.'_');
        }*/
        $item = [
            'name'=>$name,
            'category_id'=>$categoryId,
            'status'=>$status,
            'code'=>$this->request->code??null,
            'title'=>$this->request->title??null,
            'tag'=>$this->request->tag??null,
            'url_seo'=>$this->request->url_seo??null,
            'priority'=>$this->request->priority??null,
            'manufacturer_id'=>$this->request->manufacturer_id??null,
        ];
        if(!empty($image) && $image['status'] && !empty($image['url'])){
            $item['image']=$image['url'];
        }

        $desc = [
            'short_desc'=>$shortDesc,
            'long_desc'=>$longDesc
        ];

        $validate = $this->validator($item,$this->rules);

        if(!empty(!empty($validate))){
            return $this->respondForward(['message'=>$validate,'data'=>null,'status'=>false]);
        }
        $data = [
            "item"   =>$item,
            'desc'      =>$desc,
            'info'      =>$info,
            'prices'    =>$prices,
            'attrs'     =>$attrs,
            'variant'  =>$variants,
            'skus'      =>$skus
        ];
        $dataDel=[
            'images'    =>explode(',',$imgDel),
            'skus'      =>explode(',',$skuDel),
            'prices'    =>explode(',',$priceDel),
            'attrs'     =>explode(',',$attrDel)
        ];
//        $res = $this->repos->createItem($data,$files);
        if(!empty($id)){
            $res = $this->repos->updateItem($id,$data,$files,$dataDel);
        }
        else{
            $res = $this->repos->createItem($data,$files);
        }
        return $this->respondForward($res);
    }
    public function getVariant(){
        $data = $this->request;
        $res = $this->repos->getVariant($data);
        return $this->respondForward(['status'=>true,'data'=>$res,'message'=>'']);
    }
}