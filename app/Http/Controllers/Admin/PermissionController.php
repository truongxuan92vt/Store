<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionController extends BaseController
{
    public function index()
    {
        $role = DB::table('roles')->get();
        return view('admins.permission.index',['roles'=>$role]);
    }
    public function listPermissionByRole($role){
        $functions = DB::table('functions')->select('id','icon','function_name as text','parent_id','status')
            ->where('status','EN')
            ->get();
        $functions = json_decode(json_encode($functions),true);
        $permission = DB::table('function_roles')->select('function_id')->where('role_id',$role)->where("status",'EN')->get();
        $arrPer = [];
        if(count($permission)>0)
            foreach ($permission as $item)
            {
                $arrPer[]=$item->function_id;
            }
        $menu = $this->subFunction($functions,$arrPer);
        return $menu;
    }
    public function subFunction($array,$permission , $parent_id = 0){
        $temp_array = array();
        foreach($array as $element)
        {
            $status = false;
            if(in_array($element['id'],$permission)){
                $status = true;
            }
            $element['state']=['selected'=>$status];
            if($element['parent_id']==$parent_id)
            {
                $element['children'] = $this->subFunction($array,$permission,$element['id']);
                if(count($element['children'])>0)
                    $element['state']=['selected'=>false];
                $temp_array[] = $element;
            }
        }
        return $temp_array;
    }
    public function updatePermission(){
        $data = $this->_request->all();
        $roleId = $this->_request->get('roleId');
        $function = $this->_request->get('function');
        if($roleId==0){
            return $this->respondForward(['status'=>false,'message'=>'Please choise permission']);
        }
        try{
            DB::beginTransaction();
            $functionId = $function['id'];
            $status = $function['status']==1?'EN':'DI';
            $children = DB::table('functions')->where('parent_id',$functionId)->where('status','EN')->get();
            if(count($children)>0){
                foreach ($children as $item){
                    $childrenL2 = DB::table('functions')->where('parent_id',$item->id)->where('status','EN')->get();
                    if(count($childrenL2)>0){
                        foreach ($childrenL2 as $childL2){
                            $isExistPermission = DB::table('function_roles')->where('function_id',$childL2->id)->where('role_id',$roleId)->first();
                            if($isExistPermission){
                                DB::table('function_roles')->where('function_id',$childL2->id)->where('role_id',$roleId)->update(['status'=>$status]);
                            }
                            else{
                                DB::table('function_roles')->insert(['role_id'=>$roleId,'function_id'=>$childL2->id,'status'=>$status]);
                            }
                        }
                    }
                    $isExistPermission = DB::table('function_roles')->where('function_id',$item->id)->where('role_id',$roleId)->first();
                    if($isExistPermission){
                        DB::table('function_roles')->where('function_id',$item->id)->where('role_id',$roleId)->update(['status'=>$status]);
                    }
                    else{
                        DB::table('function_roles')->insert(['role_id'=>$roleId,'function_id'=>$item->id,'status'=>$status]);
                    }

                }

            }
            $isExistPermission = DB::table('function_roles')->where('function_id',$functionId)->where('role_id',$roleId)->first();
            if($isExistPermission){
                DB::table('function_roles')->where('function_id',$functionId)->where('role_id',$roleId)->update(['status'=>$status]);
            }
            else{
                DB::table('function_roles')->insert(['role_id'=>$roleId,'function_id'=>$functionId,'status'=>$status]);
            }
            //Check parent
            $functionDB = DB::table('functions')->where('id',$functionId)->where('status','EN')->first();
            if($functionDB){
                $parent = DB::table('functions')->where('id',$functionDB->parent_id)->where('status','EN')->first();
                if($parent){
                    //Check parent of Parent
                    $parentL1 = DB::table('functions')->where('id',$parent->parent_id)->where('status','EN')->first();
                    if($parentL1){
                        $isExistPermission = DB::table('function_roles')->where('function_id',$parentL1->id)->where('role_id',$roleId)->first();
                        if($isExistPermission){
                            DB::table('function_roles')->where('function_id',$parentL1->id)->where('role_id',$roleId)->update(['status'=>$status]);
                        }
                        else{
                            DB::table('function_roles')->insert(['role_id'=>$roleId,'function_id'=>$parentL1->id,'status'=>$status]);
                        }
                    }

                    $isExistPermission = DB::table('function_roles')->where('function_id',$parent->id)->where('role_id',$roleId)->first();
                    if($isExistPermission){
                        DB::table('function_roles')->where('function_id',$parent->id)->where('role_id',$roleId)->update(['status'=>$status]);
                    }
                    else{
                        DB::table('function_roles')->insert(['role_id'=>$roleId,'function_id'=>$parent->id,'status'=>$status]);
                    }
                }
            }
            DB::commit();
            return $this->respondForward(['status'=>true,'message'=>'Permission was updated success']);
        }
        catch (\Exception $e){
            DB::rollBack();
            return $this->respondForward(['status'=>false,'message'=>'System Error','data'=>$e->getMessage()]);
        }

    }
}