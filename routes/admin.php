<?php

$router->get('',[
    'as'=>'admin.home',
    'uses'=>'HomeController@home'
])->middleware('auth.admin');

$router->group([
    'prefix'     => 'auth',
    'namespace'  => 'Auth',
], function ($router) {
    $router->get('login',[
        'as' => 'admin.auth.login.form',
        'uses' => 'LoginController@showLoginForm'
    ]);
    $router->post('login',[
        'as' => 'admin.auth.login',
        'uses' => 'LoginController@login'
    ]);
    $router->get('logout',[
        'as' => 'admin.auth.logout',
        'uses' => 'LoginController@logout'
    ]);
    $router->post('register',[
        'as' => 'admin.auth.register',
        'uses' => 'RegisterController@create'
    ]);
});

$router->group([
    'prefix'     => 'function',
    'middleware' => ['auth.admin'],
], function ($router) {
    $router->get('',[
        'as'=>'admin.function',
        'uses'=>'FunctionController@getFunctionList'
    ]);
});

$router->group([
    'prefix'     => 'user',
    'middleware' => ['auth.admin'],
],function($router){
    $router->get('',[
        'as'    =>'admin.user.index',
        'uses'  =>'UserController@index'
    ]);
    $router->get('detail',[
        'as'     =>  'admin.user.detail',
        'uses'   =>  'UserController@detail'
    ]);
});

