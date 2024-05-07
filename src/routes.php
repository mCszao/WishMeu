<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/list/add', 'WishListController@add');
$router->post('/list/save', 'WishListController@save');
$router->get('/categorie/add', 'CategorieController@add');
$router->post('/categorie/save', 'CategorieController@save');
$router->get('/item/add', 'ItemController@add');
$router->post('/item/save', 'ItemController@save');
