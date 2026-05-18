<?php

$router->post('/books', 'BookController@store');
$router->get('/books', 'BookController@index');
