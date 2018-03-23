<?php
namespace App\Http\Repositories;

use App\Models\FunctionRole;

class FunctionRoleRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return FunctionRole::class;
    }
}