<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\RoleRepository;
use App\Libraries\Helpers;
use Illuminate\Http\Request;

class RoleController extends BaseController
{

    protected $request, $repos;

    public function __construct(Request $_request, RoleRepository $_repos)
    {
        $this->repos = $_repos;
        $this->request = $_request;
    }

    public function index()
    {
        $data = $this->repos->getList();
        return view('admins.roles.index', ['data' => $data,'statusList'=>Helpers::convertCombo(STATUS_SYS)]);
    }
    public function detail(){
        $id = $this->request->get('id');
        $data = [];
        if(!empty($id)){
            $data = $this->repos->find($id);
        }
        return view('admins.roles.detail',['data'=>$data,'statusList'=>Helpers::convertCombo(STATUS_SYS)]);
    }
    public function save(){
        $id = $this->request->get('id');
        $roleName = $this->request->get('roleName');
        $status = $this->request->get('status');
        $dataIns = ['id'=>$id,'role_name'=>$roleName,'status'=>$status];
        if(!empty($id)){
            $role = $this->repos->find($id);
            if($role){
                $role->role_name = $roleName;
                $role->status = $status;
                $role->update();
            }
        }
        else{
            $this->repos->create($dataIns);
        }
        return $this->respondForward(['message'=>'Role was created successful','data'=>null,'status'=>true]);
    }
    public function search(){
        $res = $this->repos->searchRole($this->request);
        return $this->respond(true,$res,'');
    }
}