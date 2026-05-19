<?php
use core\Router;
require_once '../../../routes/web.php';

$router = new Router();
$router->dispatch(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD']
);