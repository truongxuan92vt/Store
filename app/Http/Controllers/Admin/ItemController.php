<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\CategoryRepository;
use App\Libraries\Helpers;
use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use App\Http\Repositories\ItemRepository;

class ItemController extends BaseController {
    public function __construct(Request $_request,ItemRepository $_repos)
    {
        parent::__construct($_request,$_repos);
    }
    protected $rules=[
        'item_name'=>'required',
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
        $item = $this->repos->find($id);
        return view('admins.items.detail',['data'=>$item,'category'=>$category,'statusList'=>Helpers::convertCombo(STATUS_SYS)]);
    }
    public function list(){
        $data = $this->request;
        $res = $this->repos->getList($data);
        return $this->respondForward(['status'=>true,'data'=>$res,'message'=>'']);
    }
    public function save(){
        $res = ['message'=>'Item was updated successful','data'=>[],'status'=>true];
        $id = $this->request->id??null;
        $name = $this->request->get('item_name');
        $categoryId = $this->request->get('category_id');
        $status = $this->request->get('status');
        $note = $this->request->get('note');
        $des = $this->request->get('des');
        $imageRemoves = $this->request->get('image_remove');

        if($this->request->hasFile('image')){
            $image = Helpers::uploadImage($this->request->file('image'),PATH_IMAGE_ITEM,$id.'_');
        }
//        for($i=0; $i<count($_FILES['files']['name']);$i++){
//            dd($_FILES['files']['name'][$i]);
//        }
        $dataIns = [
            'item_name'=>$name,
            'category_id'=>$categoryId,
            'status'=>$status,
            'note'=>$note,
            'des'=>$des
        ];
        $validate = $this->validator($dataIns,$this->rules);

        if(!empty(!empty($validate))){
            return $this->respondForward(['message'=>$validate,'data'=>null,'status'=>false]);
        }
        if(!empty($image) && $image['status'] && !empty($image['url'])){
            $dataIns['image']=$image['url'];
        }
        if(!empty($id)){
            $item = $this->repos->find($id);
            Item::where('id',$id)->update($dataIns);
        }
        else{
            $item = $this->repos->create($dataIns);
            $res['message']='Item was created successful';
        }
        $res['data']=$item;
        if($item){
            $urlFiles = [];
            $id = $item->id;
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
                    ItemImage::where('item_id',$id)->where('url',$img)->delete();
                }
            }
            foreach ($urlFiles as $url){
                ItemImage::create([
                    'item_id'=>$id,
                    'url'=>$url,
                    'status'=>ENABLE
                ]);
            }
        }
        return $this->respondForward($res);
    }
}