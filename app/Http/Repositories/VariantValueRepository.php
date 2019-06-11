<?php
namespace App\Http\Repositories;


use App\Models\VariantValue;

class VariantValueRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return VariantValue::class;
    }
}