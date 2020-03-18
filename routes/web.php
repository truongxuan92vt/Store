<?php
//$router->get('',[
//    'as'=>'web.home',
//    'uses'=>'HomeController@home'
//]);
$router->get('',[
    'as'=>'web.home',
    'uses'=>'HomeController@home'
]);
$router->get('/category',[
    'as'=>'web.category.index',
    'uses'=>'HomeController@getCategory'
]);
$router->get('/item',[
    'as'=>'web.item.detail',
    'uses'=>'ItemController@detail'
]);
$router->get('/cart',[
    'as'=>'web.cart.detail',
    'uses'=>'CartController@detail'
]);
$router->get('/order',[
    'as'=>'web.order.detail',
    'uses'=>'OrderController@detail'
]);