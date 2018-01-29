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

    public function getActiveMenu($routeUrl){
        $user = Auth::user();
        $menu = $this->getMenuByUser($user->id);
        $data = [];
        $currentFunctionId = DB::table('functions')->where('url','/'.$routeUrl)->first();
        if($currentFunctionId){
            $res = $this->getListParent($menu,$currentFunctionId->id,$data);
            return json_encode($data);
        }
        else{
            return json_encode([]);
        }
    }

    public function getListParent($array, $child_id,&$data=[]){
        foreach ($array as $item){
            if($item['id'] == $child_id){
                $data[] = $item['id'];
                $this->getListParent($array,$item['parent_id'],$data);
            }
        }
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
        $res = $this->getMenu();
        return view('admins.functions.index',['data'=>$res]);
    }
}