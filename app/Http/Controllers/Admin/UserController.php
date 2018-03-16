<?php
namespace App\Http\Controllers\Admin;

use App\Models\User\User;
use App\Http\Controllers\Controller;
use App\Http\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {

    protected $_repository;
    protected $_request;

    public function __construct(Request $request,UserRepository $repository)
    {
        $this->_repository = $repository;
        $this->_request = $request;
    }

    public function index(){
        $data = $this->_repository->getList();
        return view('admins.users.index',['data'=>$data]);
    }
    public function search(){
        $res = $this->_repository->searchUser($this->_request);
        return $this->respond(true,$res,'');
    }
    public function detail(){
        $userID = $this->_request->get('id');
        $data = [];
        if(!empty($userID)){
            $user = $this->_repository->detail($userID);
            if($user){
                $data = $user;
            }
        }
        $role = DB::table('roles')->get();
        return view('admins.users.detail',['data'=>$data,'roles'=>$role]);
    }
    public function save(){
        $user_id = $this->_request->get('id');
        $res = null;
        $res = self::fileUpload('/upload/avatar');
        if(empty($user_id)){
            $pass = $this->_request->get('password')??'12345';
            $dataIns = [
                'username'=>$this->_request->get('username'),
                'first_name'=>$this->_request->get('first_name'),
                'last_name'=>$this->_request->get('last_name'),
                'email'=>$this->_request->get('email'),
                'password'=>bcrypt($pass),
                'image'=>!empty($res['fileName'])?$res['fileName']:'avatar.jpeg'
            ];
            $res =  $this->_repository->create($dataIns);
            if($res && !empty($this->_request->get('role_id'))){
                DB::table('user_roles')->insert(['user_id'=>$res->id,'role_id'=>$this->_request->get('role_id')]);
            }
        }
        else{
            $dataUpdate = [
                'first_name'=>$this->_request->get('first_name'),
                'last_name'=>$this->_request->get('last_name'),
                'email'=>$this->_request->get('email')
            ];
            if(!empty($res['fileName'])){
                $dataUpdate['image']=$res['fileName'];
            }
            if(!empty($this->_request->get('password'))){
                $dataUpdate['password']=bcrypt($this->_request->get('password'));
            }
            $this->_repository->update($user_id,$dataUpdate);
            $res = $this->_repository->find($user_id);
            if($res && !empty($this->_request->get('role_id'))){
                $role = DB::table('user_roles')->where('user_id',$res->id)->where('role_id',$this->_request->get('role_id'))->first();
                if(!$role)
                    DB::table('user_roles')->insert(['user_id'=>$res->id,'role_id'=>$this->_request->get('role_id')]);
            }
        }
        return Redirect::back()->with('message','Operation Successful !');
    }
    public function fileUpload($path) {
        $result = [
            'status'=>false,
            'fileName'=>''
        ];
        $request = $this->_request;
//        $this->validate($request, [
//            'image' => 'required|image|mimes:jfif,jpeg,png,jpg,gif,svg|max:2048',
//        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $image->move($destinationPath, $name);
//            $this->save();
            $result['status']=true;
            $result['fileName']=$name;
        }
        return $result;
    }
}