<?php

namespace core;

class Router
{
    private array $routes = [];

    public function get($uri, $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action): void
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($uri, $method)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            die("404 Not Found");
        }

        [$controller, $function] = explode('@', $action);

        $controllerClass = "controllers\\$controller";

        require_once "../app/controllers/$controller.php";

        $controllerObject = new $controllerClass();

        call_user_func([$controllerObject, $function]);
    }
}