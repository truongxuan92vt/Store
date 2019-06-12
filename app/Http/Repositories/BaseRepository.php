<?php

namespace App\Http\Repositories;

use \Prettus\Repository\Eloquent\BaseRepository as Repository;
abstract class BaseRepository extends Repository
{
    public static function init(){
        return app(static::class);
    }
}