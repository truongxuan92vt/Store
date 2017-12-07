<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FunctionController extends Controller {

    public function __construct()
    {
    }

    public function getMenu(){
        $user = Auth::user();
        $functions = DB::table('functions')->select('functions.*')
            ->leftJoin('function_roles','function_roles.function_id','functions.id')
            ->leftJoin('user_roles','user_roles.id','function_roles.role_id')
            ->where('user_roles.user_id',$user->id)
            ->get();
        $functions = json_decode(json_encode($functions),true);
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

    function html_ordered_menu($array,$parent_id = 0)
    {
        $menu_html = '<ul>';
        foreach($array as $element)
        {
            if($element['parent_id']==$parent_id)
            {
                $menu_html .= '<li><a href="'.$element['url'].'">'.$element['name'].'</a>';
                $menu_html .= ordered_menu($array,$element['id']);
                $menu_html .= '</li>';
            }
        }
        $menu_html .= '</ul>';
        return $menu_html;
    }

    function getFunctionList(){
        $res = DB::table('functions')->get();
        return view('admins.functions.index',['data'=>$res]);
    }
}