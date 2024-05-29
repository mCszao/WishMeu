<?php
use core\Router;

$router = new Router();
//Default route
$router->get('/', 'HomeController@index');
//List routes
$router->get('/list/add', 'WishListController@add');
$router->get('/list/add/{id}', 'WishListController@add');
$router->post('/list/save', 'WishListController@save');
$router->post('/list/edit/{id}', 'WishListController@edit');
$router->get('/list/{id}', 'WishListController@details');
$router->get('/list/delete/{id}', 'WishListController@delete');
//Category routes
$router->get('/categorie/add', 'CategorieController@add');
$router->get('/categorie/add/{id}', 'CategorieController@add');
$router->post('/categorie/edit/{id}', 'CategorieController@edit');
$router->get('/categorie/delete/{id}', 'CategorieController@delete');
$router->post('/categorie/save', 'CategorieController@save');
//Item routes
$router->get('/item', 'ItemController@index');
$router->get('/item/add', 'ItemController@add');
$router->get('/item/add/{id}', 'ItemController@add');
$router->post('/item/save', 'ItemController@save');
$router->post('/item/edit/{id}', 'ItemController@edit');
$router->get('/item/delete/{id}', 'ItemController@delete');
//ItemList correlation routes
$router->post('/item/additemlist', 'ItemToListController@addItemToList');
$router->post('/item/edititemlist/{id}', 'ItemToListController@edit');
$router->get('/item/deleteitemlist/{id}', 'ItemToListController@delete');
$router->get('/item/edititemlist/conclued/{id}', 'ItemToListController@setConclued');