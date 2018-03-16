<?php
namespace App\Http\Repositories\User;

use App\Models\User\User;
use App\Http\Repositories\BaseRepository;

class UserRepository extends BaseRepository{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    public function getList(){
        $res = $this->_model
            ->select('users.*','roles.role_name', 'user_roles.role_id')
            ->leftJoin('user_roles','users.id','user_roles.user_id')
            ->leftJoin('roles','user_roles.role_id','roles.id')
            ->distinct('users.id')
            ->get()
            ;
        return $res;
    }
    public function searchUser($data){
        $query = $this->_model->select('*');
        if(!empty($data['userName'])){
            $query->where('username','like','%'.$data['userName'].'%');
        }
        if(!empty($data['firstName'])){
            $query->where('first_name','like','%'.$data['firstName'].'%');
        }
        if(!empty($data['lastName'])){
            $query->where('last_name','like','%'.$data['lastName'].'%');
        }
        if(!empty($data['email'])){
            $query->where('email','like','%'.$data['email'].'%');
        }
        $res = $query->get();
        return $res;
    }
    public function detail($user_id){
        $res = $this->_model
            ->select('users.*','roles.role_name', 'user_roles.role_id')
            ->leftJoin('user_roles','users.id','user_roles.user_id')
            ->leftJoin('roles','user_roles.role_id','roles.id')
            ->where('users.id',$user_id)
            ->first();
        return $res;
    }
}