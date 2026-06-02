<?php

use core\Router;

$router->get('/', 'HomeController@index');
$router->get('/home', 'PageController@home');
$router->get('/exchange', 'PageController@exchange');
$router->get('/profile', 'PageController@profile');
$router->get('/login', 'PageController@login');

$router->get('/dashboard', 'DashboardController@index');

$router->post('/books', 'BookController@store');
$router->get('/books', 'BookController@index');
$router->get('/books/create', 'BookController@create');
$router->get('/books/show', 'BookController@show');
$router->get('/books/edit', 'BookController@edit');
$router->post('/books/update', 'BookController@update');
