<?php

use core\Router;

/** @var Router $router */
$router->get('/', 'PageController@home');
$router->get('/home', 'PageController@home');
$router->get('/exchange', 'PageController@exchange');
$router->get('/profile', 'PageController@profile');
$router->get('/login', 'PageController@login');

$router->get('/dashboard', 'DashboardController@index');

$router->post('/books', 'BookController@store');
$router->get('/books', 'BookController@index');
$router->get('/books/create', 'BookController@create');
$router->get('/books/show', 'BookController@show');
