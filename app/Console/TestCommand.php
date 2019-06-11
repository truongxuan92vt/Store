<?php
/**
 * Created by PhpStorm.
 * User: Truong Xuan
 * Date: 5/23/2019
 * Time: 11:12 AM
 */

namespace App\Console;


use Illuminate\Console\Command;

class TestCommand extends Command
{
    protected $signature = "test";
    protected $description = "Test";

    public  function handle(){
        $date = date('YmdHis');
        dd($date);
        $array = [
            [
                "variant_id"=>1,
                "values"=>[1,2,3]
            ],
            [
                "variant_id"=>2,
                "values"=>[4,5]
            ],
            [
                "variant_id"=>3,
                "values"=>[6,7,8,9]
            ],
            [
                "variant_id"=>4,
                "values"=>[10,12]
            ]
        ];
        $arrV = [];
        $num = 1;
        foreach ($array as $row){
            $num *= count($row['values']);
            $arrV[]=$row['values'];
        }
        $next = 0;
        $lArr = count($arrV)-1;
        $res = [];
        foreach ($arrV[0] as $v0){
            if(!empty($arrV[1])){
                foreach ($arrV[1] as $v1){
                    if(!empty($arrV[2])){
                        foreach ($arrV[2] as $v2){
                            if(!empty($arrV[3])){
                                foreach ($arrV[3] as $v3){
                                    $res[]=[$v0,$v1,$v2,$v3];
                                }
                            }
                            else{
                                $res[]=[$v0,$v1,$v2];
                            }
                        }
                    }
                    else{
                        $res[]=[$v0,$v1];
                    }
                }
            }
            else{
                $res[]=[$v0];
            }
        }
        dd(($res));
        self::recursive($arrV,$res);
    }
    public function recursive($array, &$out, $next){
        $values = $array[$next];
        $break = $num/count($values);
        $lV = count($values);
        for($i=0; $i<$num; $i++){
            var_dump(123);
            $k = ($i%$lV);
            if($k<0){
                $k=0;
            }
            $out[$i][]= $values[$k];
        }
        unset($array[$next]);
        if(!empty($array)){
            $next++;
            self::recursive($array,$out,$num, $next);
        }
        return ;
    }
}