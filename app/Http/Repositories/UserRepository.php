<?php
namespace App\Http\Repositories;

use App\Libraries\Helpers;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $selectField = array(
            'users.id',
            'users.username',
            'users.password',
            'users.email',
            'users.first_name',
            'users.last_name',
            'users.image',
            'users.created_by',
            'users.created_at',
            'users.updated_by',
            'users.updated_at',
            'roles.role_name',
            'roles.role_name',
            'user_roles.role_id'
        );
        $res = $this->model
            ->select($selectField)
            ->leftJoin('user_roles','users.id','user_roles.user_id')
            ->leftJoin('roles','user_roles.role_id','roles.id')
            ->groupBy($selectField)
            ->paginate( Helpers::getLimit(),['users.id']);
        return $res;
    }
    public function searchUser($data){
        $query = $this->model->select('*');
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
        $res = $this->model
            ->select('users.*','roles.role_name', 'user_roles.role_id')
            ->leftJoin('user_roles','users.id','user_roles.user_id')
            ->leftJoin('roles','user_roles.role_id','roles.id')
            ->where('users.id',$user_id)
            ->first();
        return $res;
    }
    public function save($data){

    }
}