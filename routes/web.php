<?php

use core\Router;


/** @var Router $router */
$router->get('/dashboard', 'DashboardController@index');

$router->post('/books', 'BookController@store');
$router->get('/books', 'BookController@index');
$router->get('/books/create', 'BookController@create');