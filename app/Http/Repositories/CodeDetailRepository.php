<?php
namespace App\Http\Repositories;

use App\Models\CodeDetail;

class CodeDetailRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return CodeDetail::class;
    }
}