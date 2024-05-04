<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/list/add', 'WishListController@add');
$router->post('/list/save', 'WishListController@save');