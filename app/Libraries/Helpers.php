<?php
namespace App\Libraries;
class Helpers{
    public static function convertCombo($data){
        $res = [];
        foreach ($data as $k=>$v){
            $res[]=['value'=>$k,'text'=>$v];
        }
        return $res;
    }
    public static function getLimit(){
        $limit = PAGINATION;
        if(!empty(session('LIMIT')))
            $limit = session('LIMIT');
        return $limit;
    }
}