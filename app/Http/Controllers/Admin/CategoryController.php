<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\CategoryRepository;
use App\Libraries\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends BaseController {
    public function __construct(Request $_request,CategoryRepository $_repos)
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
        $id = $this->request->id??null;
        $name = $this->request->get('category_name');
        $status = $this->request->get('status');
        $note = $this->request->get('note');
        $dataIns = ['category_name'=>$name,'status'=>$status,'note'=>$note];
        if(!empty($id)){
            $category = $this->repos->find($id);
            if($category){
                $category->update($dataIns);
            }
            return $this->respondForward(['message'=>'Category was updated successful','data'=>null,'status'=>true]);
        }
        else{
            $this->repos->create($dataIns);
            return $this->respondForward(['message'=>'Category was created successful','data'=>null,'status'=>true]);
        }
    }
}