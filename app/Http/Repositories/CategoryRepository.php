<?php
namespace App\Http\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return Category::class;
    }
    public function getList(){
        $res = $this->model->get();
        return $res;
    }
}