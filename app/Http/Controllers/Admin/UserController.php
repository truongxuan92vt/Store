<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    public function index(){
        $data = DB::table('users')->get();
        return view('admins.users.index',['data'=>$data]);
    }
}