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
//    'middleware'    =>  ['auth.admin'],
], function($router){
    $router->get('',[
        'as'    =>  'admin.category.index',
        'uses'  =>  'ItemCategoryController@index'
    ]);
    $router->get('list',[
        'as'    =>  'admin.category.list',
        'uses'    =>  'ItemCategoryController@list',
    ]);
    $router->get('/search',[
        'as'    =>'admin.category.search',
        'uses'  =>'ItemCategoryController@search'
    ]);
    $router->get('detail',[
        'as'     =>  'admin.category.detail',
        'uses'   =>  'ItemCategoryController@detail'
    ]);
    $router->post('save',[
        'as'     =>  'admin.category.save',
        'uses'   =>  'ItemCategoryController@save'
    ]);
    $router->get('list-web',[
        'as'     =>  'admin.category.web',
        'uses'   =>  'ItemCategoryController@getCategoryForWeb'
    ]);
    $router->get('option',[
        'as'    =>  'admin.category.option',
        'uses'  =>  'ItemCategoryController@getOption'
    ]);
});

$router->group([
    'prefix'        =>  'item',
    'middleware'    =>  ['auth.admin'],
], function($router){
    $router->get('',[
        'as'    =>  'admin.item.index',
        'uses'  =>  'ItemController@index'
    ]);
    $router->get('list',[
        'as'    =>  'admin.item.list',
        'uses'    =>  'ItemController@list',
    ]);
    $router->get('detail',[
        'as'     =>  'admin.item.detail',
        'uses'   =>  'ItemController@detail'
    ]);
    $router->post('save',[
        'as'     =>  'admin.item.save',
        'uses'   =>  'ItemController@save'
    ]);
});

$router->group([
    'prefix'        =>  'master',
    'middleware'    =>  ['auth.admin'],
], function($router){
    $router->get('color',[
        'as'    =>  'admin.master.color',
        'uses'  =>  'ColorController@getOption'
    ]);
    $router->get('color-by-id',[
        'as'    =>  'admin.master.color-by-id',
        'uses'  =>  'ColorController@getOptionById'
    ]);
    $router->get('size',[
        'as'    =>  'admin.master.size',
        'uses'  =>  'SizeController@getOption'
    ]);
    $router->get('size-by-id',[
        'as'    =>  'admin.master.size-by-id',
        'uses'  =>  'SizeController@getOptionById'
    ]);
});

$router->group([
    'prefix'        =>  'option',
    'middleware'    =>  ['auth.admin'],
], function($router){
    $router->get('variant',[
        'as'    =>  'admin.option.variant',
        'uses'  =>  'OptionController@getVariant'
    ]);
    $router->get('variant-value',[
        'as'    =>  'admin.option.variant-value',
        'uses'  =>  'OptionController@getVariantValue'
    ]);
});