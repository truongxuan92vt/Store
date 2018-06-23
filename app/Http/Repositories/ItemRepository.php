<?php
namespace App\Http\Repositories;

use App\Models\Item;

class ItemRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return Item::class;
    }
    public function getList($data = null){
    	$res = $this->model->get();
    	return $res;
    }
}