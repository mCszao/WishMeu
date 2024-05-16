<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/list/add', 'WishListController@add');
$router->get('/list/add/{id}', 'WishListController@add');
$router->post('/list/save', 'WishListController@save');
$router->post('/list/edit/{id}', 'WishListController@edit');
$router->get('/list/{id}', 'WishListController@details');
$router->get('/list/delete/{id}', 'WishListController@delete');
$router->get('/categorie/add', 'CategorieController@add');
$router->get('/categorie/add/{id}', 'CategorieController@add');
$router->post('/categorie/edit/{id}', 'CategorieController@edit');
$router->post('/categorie/save', 'CategorieController@save');
$router->get('/item/add', 'ItemController@add');
$router->post('/item/save', 'ItemController@save');
$router->post('/item/additemlist', 'ItemController@itemToList');
$router->get('/item/deleteitemlist/{id}', 'ItemController@delete');