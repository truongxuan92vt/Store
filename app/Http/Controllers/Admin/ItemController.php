<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\CategoryRepository;
use App\Libraries\Helpers;
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
        $id = $this->request->id??null;
        $name = $this->request->get('item_name');
        $categoryId = $this->request->get('category_id');
        $status = $this->request->get('status');
        $note = $this->request->get('note');
        $des = $this->request->get('des');
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
        if(!empty($id)){
            $item = $this->repos->find($id);
            if($item){
                $item->update($dataIns);
            }
            return $this->respondForward(['message'=>'Item was updated successful','data'=>null,'status'=>true]);
        }
        else{
            $this->repos->create($dataIns);
            return $this->respondForward(['message'=>'Item was created successful','data'=>null,'status'=>true]);
        }
    }
}