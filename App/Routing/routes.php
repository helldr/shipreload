<?php
$router = new AltoRouter;
$router->map('GET', '/', 'App\Controllers\IndexController@index', 'home');
$router->map('POST', '/', 'App\Controllers\IndexController@showResult', 'show_result');

$router->map('GET', '/restapi/[i:distance]', 'App\Controllers\IndexController@restapi', 'restapi');