<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController {
    public function home(){
//        return redirect('admin');
        return view('webs.home');
    }
}