<?php
namespace App\Http\Repositories;

use App\Models\UserRole;

class UserRoleRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return UserRole::class;
    }
}