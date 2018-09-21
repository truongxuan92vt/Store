<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\CategoryRepository;
use App\Libraries\Helpers;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Repositories\ProductRepository;

class ProductController extends BaseController {
    public function __construct(Request $_request,ProductRepository $_repos)
    {
        parent::__construct($_request,$_repos);
    }
    protected $rules=[
        'product_name'=>'required',
        'category_id'=>'required',
        'status'=>'required',
    ];
    public function index(){
        $category = CategoryRepository::getOption();
        return view('admins.products.index',['category'=>$category,'statusList'=>Helpers::convertCombo(STATUS_SYS)]);
    }
    public function detail(){
        $id = $this->request->id??null;
        $category = CategoryRepository::getOption();
        $product = $this->repos->find($id);
        return view('admins.products.detail',['data'=>$product,'category'=>$category,'statusList'=>Helpers::convertCombo(STATUS_SYS)]);
    }
    public function list(){
        $data = $this->request;
        $res = $this->repos->getList($data);
        return $this->respondForward(['status'=>true,'data'=>$res,'message'=>'']);
    }
    public function save(){
        $res = ['message'=>'Product was updated successful','data'=>[],'status'=>true];
        $id = $this->request->id??null;
        $name = $this->request->get('product_name');
        $categoryId = $this->request->get('category_id');
        $status = $this->request->get('status');
        $note = $this->request->get('note');
        $desc = $this->request->get('desc');
        $imageRemoves = $this->request->get('image_remove');

        if($this->request->hasFile('image')){
            $image = Helpers::uploadImage($this->request->file('image'),PATH_IMAGE_ITEM,$id.'_');
        }
//        for($i=0; $i<count($_FILES['files']['name']);$i++){
//            dd($_FILES['files']['name'][$i]);
//        }
        $dataIns = [
            'product_name'=>$name,
            'category_id'=>$categoryId,
            'status'=>$status,
            'note'=>$note,
            'desc'=>$desc
        ];
        $validate = $this->validator($dataIns,$this->rules);

        if(!empty(!empty($validate))){
            return $this->respondForward(['message'=>$validate,'data'=>null,'status'=>false]);
        }
        if(!empty($image) && $image['status'] && !empty($image['url'])){
            $dataIns['image']=$image['url'];
        }
        if(!empty($id)){
            $product = $this->repos->find($id);
            Product::where('id',$id)->update($dataIns);
        }
        else{
            $product = $this->repos->create($dataIns);
            $res['message']='Product was created successful';
        }
        $res['data']=$product;
        if($product){
            $urlFiles = [];
            $id = $product->id;
//            dd(count($_FILES['files']['name']));
            if($this->request->hasFile('files')){
                $files = $this->request->file('files');
                $i = 0;
                foreach ($files as $file){
                    $i++;
                    $url = Helpers::uploadImage($file,PATH_IMAGE_ITEM,$id.'_'.$i.'_');
                    if($url['status']){
                        $urlFiles[]=$url['url'];
                    }
                }
            }
            if(!empty($imageRemoves)){
                $imageRemoves = explode(',',$imageRemoves);
                foreach ($imageRemoves as $img){
                    try{
                        unlink('../public'.$img);
                    }
                    catch (\Exception $e){}
                    ProductImage::where('product_id',$id)->where('url',$img)->delete();
                }
            }
            foreach ($urlFiles as $url){
                ProductImage::create([
                    'product_id'=>$id,
                    'url'=>$url,
                    'status'=>ENABLE
                ]);
            }
        }
        return $this->respondForward($res);
    }
}