<?php

use core\Router;

$router->get('/', 'HomeController@index');
$router->get('/home', 'HomeController@index');
$router->get('/profile', 'DashboardController@index');
$router->get('/dashboard', 'DashboardController@index');

$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@authenticate');
$router->post('/logout', 'AuthController@logout');

$router->get('/shop', 'BookController@index');
$router->post('/books', 'BookController@store');
$router->get('/books', 'BookController@index');
$router->get('/books/create', 'BookController@create');
$router->get('/books/show', 'BookController@show');
$router->get('/books/edit', 'BookController@edit');
$router->post('/books/update', 'BookController@update');
$router->post('/books/delete', 'BookController@delete');

$router->get('/cart', 'CartController@index');
$router->post('/cart/add', 'CartController@add');
$router->post('/cart/remove', 'CartController@remove');
$router->post('/checkout', 'CartController@checkout');
