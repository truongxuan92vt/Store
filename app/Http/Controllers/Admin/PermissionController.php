<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $res = $this->getMenu();
        $role = DB::table('roles')->get();
        return view('admins.permission.index',['data'=>$res,'roles'=>$role]);
    }

    public function getMenu()
    {
        $user = Auth::user();
        $functions = $this->getMenuByUser($user->id);
        $menu = $this->ordered_menu($functions);
        return $menu;

    }
    public function ordered_menu($array, $parent_id = 0){
        $temp_array = array();
        foreach($array as $element)
        {
            if($element['parent_id']==$parent_id)
            {
                $element['subs'] = $this->ordered_menu($array,$element['id']);
                $temp_array[] = $element;
            }
        }
        return $temp_array;
    }
    public function getMenuByUser($user_id){
        $functions = DB::table('functions')->select('functions.*')
            ->leftJoin('function_roles','function_roles.function_id','functions.id')
            ->leftJoin('user_roles','user_roles.id','function_roles.role_id')
            ->where('user_roles.user_id',$user_id)
            ->get();
        $functions = json_decode(json_encode($functions),true);
        return $functions;
    }
}