<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\ColorRepository;
use App\Http\Repositories\ProductCategoryRepository;
use App\Http\Repositories\SizeRepository;
use App\Libraries\Helpers;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Repositories\ProductRepository;

class ProductController extends BaseController {
    public function __construct(Request $_request,ProductRepository $_repos)
    {
        parent::__construct($_request);
        $this->repos = $_repos;
    }
    protected $rules=[
        'name'=>'required',
        'product_category_id'=>'required',
        'status'=>'required',
    ];
    public function index(){
        $category = ProductCategoryRepository::getOption();
        return view('admins.products.index',['category'=>$category,'statusList'=>Helpers::convertCombo(STATUS_SYS)]);
    }
    public function detail(){
        $id = $this->request->id??null;
        $category = ProductCategoryRepository::getOption();
        $product = $this->repos->find($id);
        $colors = ColorRepository::option();
        $sizes = SizeRepository::option();
        return view('admins.products.detail',[
            'data'=>$product,
            'category'=>$category,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'statusList'=>Helpers::convertCombo(STATUS_SYS)]
        );
    }
    public function list(){
        $data = $this->request;
        $res = $this->repos->getList($data);
        return $this->respondForward(['status'=>true,'data'=>$res,'message'=>'']);
    }
    public function save(){
        $res = ['message'=>'Product was updated successful','data'=>[],'status'=>true];
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
        $sizes = $this->request->get('sizes');
        $colors = $this->request->get('colors');
        $skus = $this->request->t_pro_sku??null;
        $infor = $this->request->t_pro_infor??null;
        $prices = $this->request->t_pro_price??null;
        $attrs = $this->request->t_pro_attr??null;
        unset($files['--row--']);
        if($skus!=null){
            unset($skus['--row--']);
        }
        if($infor!=null){
            unset($infor['--row--']);
        }
        if($prices!=null){
            unset($prices['--row--']);
        }
        if($attrs!=null){
            unset($attrs['--row--']);
        }
        if($this->request->hasFile('image')){
            $image = Helpers::uploadImage($this->request->file('image'),PATH_IMAGE_ITEM,$id.'_');
        }
//        for($i=0; $i<count($_FILES['files']['name']);$i++){
//            dd($_FILES['files']['name'][$i]);
//        }
        $product = [
            'name'=>$name,
            'product_category_id'=>$categoryId,
            'status'=>$status,
            'code'=>$this->request->code??null,
            'title'=>$this->request->title??null,
            'tag'=>$this->request->tag??null,
            'url_seo'=>$this->request->url_seo??null,
            'priority'=>$this->request->priority??null,
            'manufacturer_id'=>$this->request->manufacturer_id??null,
        ];
        if(!empty($image) && $image['status'] && !empty($image['url'])){
            $product['image']=$image['url'];
        }

        $desc = [
            'short_desc'=>$shortDesc,
            'long_desc'=>$longDesc
        ];

        $validate = $this->validator($product,$this->rules);

        if(!empty(!empty($validate))){
            return $this->respondForward(['message'=>$validate,'data'=>null,'status'=>false]);
        }

//        $files = [];
//        if($this->request->hasFile('files')){
//            $files = $this->request->file('files');
//        }
        $data = [
            "product"=>$product,
            'desc'=>$desc,
            'sizes'=>$sizes,
            'colors'=>$colors,
            'skus'=>$skus,
            'infor'=>$infor,
            'prices'=>$prices,
            'attrs'=>$attrs
        ];
        $dataDel=[
            'images'=>explode(',',$imgDel),
            'skus'=>explode(',',$skuDel),
            'prices'=>explode(',',$priceDel),
            'attrs'=>explode(',',$attrDel)
        ];
        if(!empty($id)){
            $res = $this->repos->updateProduct($id,$data,$files,$dataDel);
        }
        else{
            $res = $this->repos->createProduct($data,$files);
        }
        return $this->respondForward($res);
    }
}