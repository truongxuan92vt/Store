<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\FunctionRepository;
use App\Http\Repositories\FunctionRoleRepository;
use App\Http\Repositories\RoleRepository;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PermissionController extends BaseController
{
    protected $request;
    protected $repos;
    protected $roleRepos;
    protected $functionRepos;

    public function __construct(Request $_request,
                                FunctionRoleRepository $_repos,
                                FunctionRepository $_functionRepos,
                                RoleRepository $_roleRepos)
    {
        $this->request = $_request;
        $this->repos = $_repos;
        $this->roleRepos = $_roleRepos;
        $this->functionRepos = $_functionRepos;
    }

    public function index()
    {
        $role = $this->roleRepos->get();
        return view('admins.permission.index', ['roles' => $role]);
    }

    public function listPermissionByRole($role)
    {
        $functions = $this->functionRepos->getDataForPermission();
        $functions = json_decode(json_encode($functions), true);
        $permission = $this->repos->getFunctionRoleByRoleID($role);
        $arrPer = [];
        if (count($permission) > 0)
            foreach ($permission as $item) {
                $arrPer[] = $item->function_id;
            }
        $menu = $this->subFunction($functions, $arrPer);
        return $menu;
    }

    public function subFunction($array, $permission, $parent_id = 0)
    {
        $temp_array = array();
        foreach ($array as $element) {
            $status = false;
            if (in_array($element['id'], $permission)) {
                $status = true;
            }
            $element['state'] = ['selected' => $status];
            if ($element['parent_id'] == $parent_id) {
                $element['children'] = $this->subFunction($array, $permission, $element['id']);
                if (count($element['children']) > 0)
                    $element['state'] = ['selected' => false];
                $temp_array[] = $element;
            }
        }
        return $temp_array;
    }

    public function updatePermission()
    {
        $data = $this->request->all();
        $roleId = $this->request->get('roleId');
        $function = $this->request->get('function');
        $functionId = $function['id']??'';
        $status = $function['status'] == 1 ? 'EN' : 'DI';
        if ($roleId == 0) {
            return $this->respondForward(['status' => false, 'message' => 'Please choise permission']);
        }
        if(empty($function['id']))
        {
            return $this->respond('Function does not exist');
        }
        $res = $this->repos->updateFunctionRole($roleId,$functionId,$status);
        return $this->respondForward($res);
    }
}