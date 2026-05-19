<?php
use core\Router;

require_once '../app/core/Router.php';

$router = new Router();

$router->post('/books', 'BookController@store');
$router->get('/books', 'BookController@index');
