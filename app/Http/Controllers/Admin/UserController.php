<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\RoleRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserRoleRepository;
use App\Libraries\GoogleAPI;
use App\Libraries\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends BaseController {

    protected $request,$repos,$roleRepos,$userRoleRepos;

    public function __construct(Request $_request,UserRepository $_repos, RoleRepository $_roleRepos,UserRoleRepository $_userRoleRepos)
    {
        $this->repos = $_repos;
        $this->roleRepos = $_roleRepos;
        $this->userRoleRepos = $_userRoleRepos;
        $this->request = $_request;
    }

    public function index(){
        $data = $this->repos->getList();
//        dd(json_decode(json_encode($data)));
        return view('admins.users.index',['data'=>$data]);
    }
    public function search(){
        $res = $this->repos->searchUser($this->request);
        return $this->respond('',true,$res);
    }
    public function detail(){
        $userID = $this->request->get('id');
        $data = [];
        if(!empty($userID)){
            $user = $this->repos->detail($userID);
            if($user){
                $data = $user;
            }
        }
        $role = $this->roleRepos->getAll();
        return view('admins.users.detail',['data'=>$data,'roles'=>$role]);
    }
    public function save(){
        $user_id = $this->request->get('id');
        $userName = $this->request->get('username');
        $res = null;
        if($this->request->hasFile('image')){
            $file = Helpers::uploadImage($this->request->file('image'),PATH_IMAGE_USER,$userName."_");
        }
        if(empty($user_id)){
            $pass = $this->request->get('password')??'12345';
            $dataIns = [
                'username'=>$userName,
                'first_name'=>$this->request->get('first_name'),
                'last_name'=>$this->request->get('last_name'),
                'email'=>$this->request->get('email'),
                'password'=>bcrypt($pass),
                'image'=>!empty($file['url'])?$file['url']:'/image/avatar.jpeg'
            ];
            $res =  $this->repos->create($dataIns);
            if($res && !empty($this->request->get('role_id'))){
                $this->userRoleRepos->create(['user_id'=>$res->id,'role_id'=>$this->request->get('role_id')]);
            }
        }
        else{
            $dataUpdate = [
                'first_name'=>$this->request->get('first_name'),
                'last_name'=>$this->request->get('last_name'),
                'email'=>$this->request->get('email')
            ];
            if(!empty($file['url'])){
                $dataUpdate['image']=$file['url'];
            }
            if(!empty($this->request->get('password'))){
                $dataUpdate['password']=bcrypt($this->request->get('password'));
            }
            $this->repos->update($user_id,$dataUpdate);
            $res = $this->repos->find($user_id);
            if($res && !empty($this->request->get('role_id'))){
                $role = $this->userRoleRepos->getFirstBy('user_id',$res->id);
                if(!$role)
                    $this->userRoleRepos->create(['user_id'=>$res->id,'role_id'=>$this->request->get('role_id')]);
                else{
                    $role->role_id = $this->request->get('role_id');
                    $role->update();
                }
            }
        }
        return Redirect::back()->with('message','Operation Successful !');
    }
    public function setSession(){
        $limit = $this->request->get('limit');
        session(['LIMIT'=>$limit]);
        return $this->respondForward(['status' => true, 'message' => 'Permission was updated success']);
    }
}