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

    public function getList($data){
        $res = $this->_model->get();
        return $res;
    }

}