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
    public function model()
    {
        return User::class;
    }

    public function getList(){
        $selectField = array(
            'user.id',
            'user.username',
            'user.password',
            'user.email',
            'user.first_name',
            'user.last_name',
            'user.image',
            'user.created_by',
            'user.created_at',
            'user.updated_by',
            'user.updated_at',
            'role.name',
            'role.name',
            'user_role.role_id'
        );
        $res = $this->model
            ->select($selectField)
            ->leftJoin('user_role','user.id','user_role.user_id')
            ->leftJoin('role','user_role.role_id','role.id')
            ->groupBy($selectField)
            ->paginate( Helpers::getLimit(),['user.id']);
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
            ->select('user.*','role.name', 'user_role.role_id')
            ->leftJoin('user_role','user.id','user_role.user_id')
            ->leftJoin('role','user_role.role_id','role.id')
            ->where('user.id',$user_id)
            ->first();
        return $res;
    }
    public function save($data){

    }
}