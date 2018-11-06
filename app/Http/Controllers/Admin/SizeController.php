<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\SizeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SizeController extends BaseController {

    protected $request,$repos;

    public function __construct(Request $_request,SizeRepository $_repos)
    {
        $this->repos = $_repos;
        $this->request = $_request;
    }
    public function getOption(){
        $data = $this->request->get('ids',[]);
        if(!is_array($data)){
            $data = [];
        }
        $res = $this->repos->option($data)->toArray();
        return response()->json($res);
    }
    public function getOptionById(){
        $data = $this->request->get('ids',[]);
        if(!is_array($data)){
            $data = [];
        }
        $res = $this->repos->optionById($data)->toArray();
        return response()->json($res);
    }
}