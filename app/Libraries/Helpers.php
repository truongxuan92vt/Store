<?php
namespace App\Libraries;
use Illuminate\Http\Request;

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
    public static function uploadImage(Request $request,$path,$keyFile=null,$server=null){
        if(empty($keyFile)){
            $keyFile = 'image';
        }
        if(empty($server)){
            $server = LOCAL;
        }
        $result = [
            'status'=>false,
            'fileName'=>'',
            'id'=>''
        ];
        if ($request->hasFile($keyFile)) {
            $currentDate = date('YmdHis');
            $image = $request->file($keyFile);
            $name = $currentDate.'.'.$image->getClientOriginalExtension();
            $id = '';
            switch ($server){
                //Upfile to GOOGLE
                case GOOGLE:
                    $result = GoogleAPI::uploadImage($image,$name);
                    $id = $result->getId();
                    break;
                //Up file to LOCAL
                default:
                    $destinationPath = public_path($path);
                    $image->move($destinationPath, $name);
                    break;
            }
            $result['status']=true;
            $result['fileName']=$name;
            $result['id']=$id;
        }
        return $result;
    }
}