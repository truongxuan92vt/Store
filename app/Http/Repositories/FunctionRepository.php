<?php

namespace App\Http\Repositories;

use App\Models\Functions;

class FunctionRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return Functions::class;
    }

    public function getDataForPermission(){
        $res = $this->model->select('id', 'icon', 'name as text', 'parent_id', 'status')
            ->where('status', ACTIVE)
            ->get();
        return $res;
    }
}