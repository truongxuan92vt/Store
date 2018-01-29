<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {
    public function index(){
        $data = DB::table('users')->get();
        return view('admins.users.index',['data'=>$data]);
    }
    public function create(Request $request){
        return true;
    }
    public function detail(Request $request){
        $userID = $request->get('id');
        $data = [];
        if(!empty($userID)){
            $user = DB::table('users')->where('id',$userID)->first();
            if($user){
                $data = $user;
            }
        }
        return view('admins.users.detail',['data'=>$data]);
    }
    public function save(Request $request){
        $user_id = $request->get('id');
        if(empty($user_id)){
            $dataIns = [
                'username'=>$request->get('username'),
                'first_name'=>$request->get('first_name'),
                'last_name'=>$request->get('last_name'),
                'email'=>$request->get('email')
            ];
            DB::table('users')->insert($dataIns);
        }
        else{
            $dataUpdate = [
                'first_name'=>$request->get('first_name'),
                'last_name'=>$request->get('last_name'),
                'email'=>$request->get('email')
            ];
            DB::table('users')->where('id',$user_id)->update($dataUpdate);
        }
//        $res = DB::table('users')->where('username',$request->get('username'))->first();
        $data = DB::table('users')->get();
        return Redirect::back()->with('message','Operation Successful !');
    }
}