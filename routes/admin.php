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
    $router->get('list',[
        'as'=>'admin.function.list',
        'uses'=>'FunctionController@getDataFullMenu'
    ]);
    $router->put('update',[
        'as'=>'admin.function.update',
        'uses'=>'FunctionController@updateFunction'
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
    $router->get('/search',[
        'as'    =>'admin.user.search',
        'uses'  =>'UserController@search'
    ]);
    $router->get('detail',[
        'as'     =>  'admin.user.detail',
        'uses'   =>  'UserController@detail'
    ]);
    $router->post('save',[
        'as'     =>  'admin.user.save',
        'uses'   =>  'UserController@save'
    ]);
    $router->put('set-session',[
        'as'     =>  'admin.user.setSession',
        'uses'   =>  'UserController@setSession'
    ]);
});
$router->group([
    'prefix'     => 'permission',
    'middleware' => ['auth.admin'],
], function ($router) {
    $router->get('',[
        'as'=>'admin.permission.index',
        'uses'=>'PermissionController@index'
    ]);
    $router->get('list/{role}',[
        'as'=>'admin.permission.index',
        'uses'=>'PermissionController@listPermissionByRole'
    ]);
    $router->put('update',[
        'as'=>'admin.permission.update',
        'uses'=>'PermissionController@updatePermission'
    ]);
});

$router->group([
    'prefix'        =>  'role',
    'middleware'    =>  ['auth.admin'],
], function($router){
    $router->get('',[
        'as'    =>  'admin.role.index',
        'uses'  =>  'RoleController@index'
    ]);
    $router->get('/search',[
        'as'    =>'admin.role.search',
        'uses'  =>'RoleController@search'
    ]);
    $router->get('detail',[
        'as'     =>  'admin.role.detail',
        'uses'   =>  'RoleController@detail'
    ]);
    $router->post('save',[
        'as'     =>  'admin.role.save',
        'uses'   =>  'RoleController@save'
    ]);
});

$router->group([
    'prefix'        =>  'category',
    'middleware'    =>  ['auth.admin'],
], function($router){
    $router->get('',[
        'as'    =>  'admin.category.index',
        'uses'  =>  'CategoryController@index'
    ]);
    $router->get('list',[
        'as'    =>  'admin.category.list',
        'uses'    =>  'CategoryController@list',
    ]);
    $router->get('/search',[
        'as'    =>'admin.category.search',
        'uses'  =>'CategoryController@search'
    ]);
    $router->get('detail',[
        'as'     =>  'admin.category.detail',
        'uses'   =>  'CategoryController@detail'
    ]);
    $router->post('save',[
        'as'     =>  'admin.category.save',
        'uses'   =>  'CategoryController@save'
    ]);
});


