<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FunctionController extends BaseController {

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
            ->leftJoin('user_roles','user_roles.role_id','function_roles.role_id')
            ->where('user_roles.user_id',$user_id)
            ->where('functions.status','EN')
            ->where('function_roles.status','EN')
            ->get();
        $functions = json_decode(json_encode($functions),true);
        return $functions;
    }
//    function html_ordered_menu($array,$parent_id = 0)
//    {
//        $menu_html = '<ul>';
//        foreach($array as $element)
//        {
//            if($element['parent_id']==$parent_id)
//            {
//                $menu_html .= '<li><a href="'.$element['url'].'">'.$element['name'].'</a>';
//                $menu_html .= ordered_menu($array,$element['id']);
//                $menu_html .= '</li>';
//            }
//        }
//        $menu_html .= '</ul>';
//        return $menu_html;
//    }

    function getFunctionList(){
        $res = $this->getMenu();
        return view('admins.functions.index',['data'=>$res]);
    }
    function getDataFullMenu(){
        $functions = DB::table('functions')->select('id','icon','function_name as text','parent_id','status')
            ->get();
        $functions = json_decode(json_encode($functions),true);
        $menu = $this->subFunction($functions);
        return $menu;
//        return $functions;
    }
    public function subFunction($array, $parent_id = 0){
        $temp_array = array();
        foreach($array as $element)
        {
            $status = false;
            if($element['status']=='EN'){
                $status = true;
            }
            $element['state']=['selected'=>$status];
            if($element['parent_id']==$parent_id)
            {
                $element['children'] = $this->subFunction($array,$element['id']);
                if(count($element['children'])>0)
                    $element['state']=['selected'=>false];
                $temp_array[] = $element;
            }
        }
        return $temp_array;
    }
    public function updateFunction(Request $request){
        $data = $request->all();
        if(!empty($data)){
            $id = $data['id'];
            $sts = $data['status']==1?'EN':'DI';
            DB::table('functions')->where('id',$id)->update(['status'=>$sts]);
            DB::table('functions')->where('parent_id',$id)->update(['status'=>$sts]);
            $isExistParent = DB::table('functions')->where('id',$id)->first();
            if($isExistParent && $sts == "EN"){
                DB::table('functions')->where('id',$isExistParent->parent_id)->update(['status'=>$sts]);
            }
            if($isExistParent && $sts == "DI"){
                $numChild = DB::table('functions')->where('parent_id',$isExistParent->parent_id)->count();
                $numDisable = DB::table('functions')->where('parent_id',$isExistParent->parent_id)->where('status','DI')->count();
                if($numChild==$numDisable)
                    DB::table('functions')->where('id',$isExistParent->parent_id)->update(['status'=>$sts]);
            }
        }
        return $this->respondForward(['status'=>true,'message'=>'Function was updated success']);
    }
}