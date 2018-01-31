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
        $res = $query->get();
        return $res;
    }

}