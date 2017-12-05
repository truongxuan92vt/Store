<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
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
    protected $redirectTo = '/admin';
    protected $redirectToLogin = 'auth.login.form';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('auth.logout');
//        $this->middleware('auth', ['except' => ['auth.logout', 'auth.login','auth.login.form']]);
    }
    public function showLoginForm(){
        Auth::logout();
        return view('auths.login');
    }
    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
//        $user = Auth::loginUsingId(1);
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended($this->redirectTo);
        }
        return redirect()->route($this->redirectToLogin);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route($this->redirectToLogin);
    }
}
