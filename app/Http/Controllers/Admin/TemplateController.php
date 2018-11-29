<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TemplateController extends BaseController {

    protected $request,$repos;

    public function __construct(Request $_request,UserRepository $_repos)
    {
        $this->repos = $_repos;
        $this->request = $_request;
    }
    public function index(){
        
    }
}