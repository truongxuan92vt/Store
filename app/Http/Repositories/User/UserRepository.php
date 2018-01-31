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
        $res = $this->_model->get();
        return $res;
    }
    public function searchUser($data){
        $query = $this->_model->select('*');
        if(!empty($data['userName'])){
            $query->where('username',$data['userName']);
        }
        if(!empty($data['firstName'])){
            $query->where('first_name',$data['firstName']);
        }
        if(!empty($data['lastName'])){
            $query->where('last_name',$data['lastName']);
        }
        if(!empty($data['email'])){
            $query->where('email',$data['email']);
        }
        $res = $query->get();
        return $res;
    }

}