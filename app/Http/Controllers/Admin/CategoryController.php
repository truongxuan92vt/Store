<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends BaseController {

    protected $request,$repos;

    public function __construct(Request $_request,CategoryRepository $_repos)
    {
        $this->repos = $_repos;
        $this->request = $_request;
    }
    public function index(){
        $data = $this->repos->getList();
        return view('admins.categories.index',['data'=>$data]);
    }
}