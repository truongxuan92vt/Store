<?php
namespace App\Http\Repositories;


use App\Models\OptionValue;

class OptionValueRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return OptionValue::class;
    }
}