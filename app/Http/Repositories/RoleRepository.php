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
    public function getModel()
    {
        return Role::class;
    }
    public function getList(){
        $data = $this->_model
            ->select(Role::getTableName().'.*',CodeDetail::getTableName().'.cm_name')
            ->leftJoin(CodeDetail::getTableName(),CodeDetail::getTableName().'.cm_code',Role::getTableName().'.status')
            ->get();
        return $data;
    }
    public function searchRole($data){
        $query = $this->_model
            ->select(Role::getTableName().'.*',CodeDetail::getTableName().'.cm_name')
            ->leftJoin(CodeDetail::getTableName(),CodeDetail::getTableName().'.cm_code',Role::getTableName().'.status');
        if(isset($data['roleName']) && !empty($data['roleName'])){
            $query->where(Role::getTableName().'.role_name','like','%'.$data['roleName'].'%');
        }
        if(isset($data['status']) && !empty($data['status'])){
            $query->where(Role::getTableName().'.status',$data['status']);
        }
        $data = $query->get();
        return $data;
    }
}