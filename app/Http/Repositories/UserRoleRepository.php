<?php
namespace App\Http\Repositories;

use App\Models\UserRole;

class UserRoleRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return UserRole::class;
    }
}