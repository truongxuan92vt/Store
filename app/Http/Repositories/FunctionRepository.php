<?php
namespace App\Http\Repositories;

use App\Models\Functions;

class FunctionRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Functions::class;
    }
}