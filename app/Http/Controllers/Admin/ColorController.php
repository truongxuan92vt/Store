<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\ColorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ColorController extends BaseController {

    protected $request,$repos;

    public function __construct(Request $_request,ColorRepository $_repos)
    {
        $this->repos = $_repos;
        $this->request = $_request;
    }
    public function getOption(){
        $data = $this->request->get('ids',[]);
        if(!is_array($data)){
            $data = [];
        }
        return $this->repos->option($data)->toArray();
    }
    public function getOptionById(){
        $data = $this->request->get('ids',[]);
        if(!is_array($data)){
            $data = [];
        }
        return $this->repos->optionById($data)->toArray();
    }
}