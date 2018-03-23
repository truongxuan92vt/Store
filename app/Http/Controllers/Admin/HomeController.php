<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController {
    public function home(){
        return view('admins.home');
    }
}