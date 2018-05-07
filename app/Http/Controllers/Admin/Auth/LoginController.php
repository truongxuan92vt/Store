<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\BaseController;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin.home';
    protected $redirectToLogin = 'admin.auth.login.form';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth.admin', ['except' => ['auth.*']]);
//        $this->middleware('guest')->except('auth.logout');
    }
    public function showLoginForm(){
        Auth::logout();
        return view('admins.auths.login');
    }
    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $remember = $request->get('remember');
        session(['LIMIT' => PAGINATION]);
        if($remember){
            $auth = Auth::attempt(['username' => $username, 'password' => $password],1);
        }
        else{
            $auth = Auth::attempt(['username' => $username, 'password' => $password]);
        }
//        $user = Auth::loginUsingId(1);
        if ($auth) {
            return redirect()->route($this->redirectTo);
        }
        return redirect()->route($this->redirectToLogin);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route($this->redirectToLogin);
    }
}
