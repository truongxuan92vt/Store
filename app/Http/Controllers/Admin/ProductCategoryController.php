<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\CategoryRepository;
use App\Libraries\Helpers;
use App\Models\CategoryBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProductCategoryController extends BaseController {
    public function __construct(Request $_request, CategoryRepository $_repos)
    {
        parent::__construct($_request,$_repos);
    }
    public function index(){
        return view('admins.categories.index',['statusList'=>Helpers::convertCombo(STATUS_SYS)]);
    }
    public static function getCategoryForWeb(){
        $catogories = CategoryRepository::getCategoryForWeb();
        $res = self::recursiveCategory($catogories);
        return $res;
    }
    public static function recursiveCategory($data,$parent_id=0){
        $temp_array = array();
        foreach ($data as $k=>$v) {
            if ($v['parent_id'] == $parent_id) {
                $v['childs'] = self::recursiveCategory($data, $v['id']);
                $temp_array[] = $v;
                unset($data[$k]);
            }
        }
        return $temp_array;
    }
    public function list(){
        $data = $this->request;
        $data = $this->repos->getList($data);
        foreach ($data as $item){
            $item->status_name = STATUS_SYS[$item->status]??'';
        }
        return $this->respondForward(['status'=>true,'data'=>$data,'message'=>'']);
    }
    public function detail(){
        $id = $this->request->id??null;
        $detail = $this->repos->find($id);
        return view('admins.categories.detail',['data'=>$detail,'statusList'=>Helpers::convertCombo(STATUS_SYS)]);
    }
    public function save(){
        $res = ['message'=>'Category Name can not null','data'=>[],'status'=>false];
        $id = $this->request->id??null;
        $name = $this->request->get('name');
        $status = $this->request->get('status');
        $desc = $this->request->get('desc');
        $parentId = $this->request->get('parent_id');
        $icon = $this->request->get('icon');
        $priority = $this->request->get('priority');
        $imageRemoves = $this->request->get('image_remove');
        $thunbnail = null;
//        dd($this->request->all());
        if($this->request->hasFile('thunbnail')){
            $thunbnail = Helpers::uploadImage($this->request->file('thunbnail'),PATH_IMAGE_CATEGORY,$id.'_');
        }
        $dataIns = [
            'name'=>$name,
            'status'=>$status,
            'desc'=>$desc,
            'parent_id'=>$parentId,
            'icon'=>$icon,
            'priority'=>$priority
        ];
        if(!empty($thunbnail) && $thunbnail['status'] && !empty($thunbnail['url'])){
            $dataIns['thunbnail']=$thunbnail['url'];
        }
        if(empty($name)){
            return $this->respondForward(['message'=>'Category Name can not null','data'=>[],'status'=>false]);
        }
        if(!empty($id)){
            $category = $this->repos->find($id);
            if($category){
                $category->update($dataIns);
            }
            $res =['message'=>'Category was updated successful','data'=>$category,'status'=>true];

        }
        else{
            $category = $this->repos->create($dataIns);
            $res = ['message'=>'Category was created successful','data'=>$category,'status'=>true];
        }
        if($category){
            $urlFiles = [];
            $id = $category->id;
            if($this->request->hasFile('banners')){
                $files = $this->request->file('banners');
                $i = 0;
                foreach ($files as $file){
                    $i++;
                    $url = Helpers::uploadImage($file,PATH_IMAGE_CATEGORY,$id.'_'.$i.'_');
                    if($url['status']){
                        $urlFiles[]=$url['url'];
                    }
                }
            }
            if(!empty($imageRemoves)){
                $imageRemoves = explode(',',$imageRemoves);
//                \File::Delete($imageRemoves);
                foreach ($imageRemoves as $img){
                    try{
                        unlink('../public'.$img);
                    }
                    catch (\Exception $e){
//                        echo $e->getMessage();
                    }
//                    \Storage::Delete('../public'.$img);
                    CategoryBanner::where('category_id',$id)->where('url',$img)->delete();
                }
            }
            foreach ($urlFiles as $url){
                CategoryBanner::create([
                    'category_id'=>$id,
                    'url'=>$url,
                    'status'=>ENABLE
                ]);
            }
        }
        return $this->respondForward($res);
    }
    public function getOption(){
        $data = $this->request->all();
        $catogories = $this->repos->getCategoryOption($data);
        $res = self::recursiveCategoryOption($catogories);
        $res[]=['id'=>0,'text'=>"No parent",'parent_id'=>0];
        $arr = [];
        foreach ($res as $item){
            $arr[$item['id']]=$item;
        }
        sort ($arr);
        $res = array_values($arr);
        return response()->json($res);
    }
    public function recursiveCategoryOption($data,$parent_id=0){
        $temp_array = array();
        foreach ($data as $k=>$v) {
            if ($v['parent_id'] == $parent_id) {
                $v['children'] = self::recursiveCategory($data, $v['id']);
                $temp_array[] = $v;
                unset($data[$k]);
            }
        }
        return $temp_array;
    }
}