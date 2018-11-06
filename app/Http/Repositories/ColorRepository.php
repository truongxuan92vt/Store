<?php
namespace App\Http\Repositories;

use App\Models\Color;

class ColorRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return Color::class;
    }
    public static function option($data = []){
        $res = Color::select(["colors.*",'colors.name as text']);
        if(!empty($data)){
            $res->whereIn('id',$data);
        }
        $res = $res->get();
        return $res;
    }
    public static function optionById($data = []){
        $res = Color::select(["colors.*",'colors.name as text'])->whereIn('id',$data);
        $res = $res->get();
        return $res;
    }
}