<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


$router->group([
    'prefix'     => 'auth',
//    'middleware' => ['auth'],
    'namespace'  => 'Auth',
], function ($router) {
    $router->get('login',[
        'as' => 'auth.login.form',
        'uses' => 'LoginController@showLoginForm'
    ]);
    $router->post('login',[
        'as' => 'auth.login',
        'uses' => 'LoginController@login'
    ]);
    $router->get('logout',[
        'as' => 'auth.logout',
        'uses' => 'LoginController@logout'
    ]);
    $router->post('register',[
        'as' => 'auth.register',
        'uses' => 'RegisterController@create'
    ]);
});
$router->group([
    'prefix'     => '',
    'middleware' => ['auth'],
//    'namespace'  => 'Auth',
], function ($router) {
    $router->get('admin',function(){
        return view('home');
    });
    $router->get('',function(){
        return redirect('admin');
    });
});




