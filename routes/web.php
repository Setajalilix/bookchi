<?php

use core\Router;

$router->get('/', 'HomeController@index');
$router->get('/home', 'HomeController@index');
$router->get('/profile', 'DashboardController@index');
$router->get('/dashboard', 'DashboardController@index');
$router->get('/profile/edit', 'ProfileController@edit');
$router->post('/profile/update', 'ProfileController@update');

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

$router->post('/orders/status', 'OrderController@updateStatus');

$router->get('/admin', 'AdminController@index');
$router->get('/admin/users', 'AdminController@users');
$router->get('/admin/categories', 'AdminController@categories');
$router->post('/admin/categories', 'AdminController@storeCategory');
$router->post('/admin/categories/update', 'AdminController@updateCategory');
$router->post('/admin/categories/delete', 'AdminController@deleteCategory');
$router->get('/admin/books', 'AdminController@books');
$router->get('/admin/books/edit', 'AdminController@editBook');
$router->post('/admin/books/update', 'AdminController@updateBook');
$router->post('/admin/books/delete', 'AdminController@deleteBook');
