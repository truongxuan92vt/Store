<?php
namespace App\Http\Repositories;

use App\Models\CodeDetail;
use App\Models\Role;

class RoleRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return Role::class;
    }
    public function getList(){
        $data = $this->model
            ->select(Role::table().'.*',CodeDetail::table().'.name as status_name')
            ->leftJoin(CodeDetail::table(),CodeDetail::table().'.code',Role::table().'.status')
            ->get();
        return $data;
    }
    public function searchRole($data){
        $query = $this->model
            ->select(Role::table().'.*',CodeDetail::table().'.name as status_name')
            ->leftJoin(CodeDetail::table(),CodeDetail::table().'.code',Role::table().'.status');
        if(isset($data['roleName']) && !empty($data['roleName'])){
            $query->where(Role::table().'.name','like','%'.$data['roleName'].'%');
        }
        if(isset($data['status']) && !empty($data['status'])){
            $query->where(Role::table().'.status',$data['status']);
        }
        $data = $query->get();
        return $data;
    }
}