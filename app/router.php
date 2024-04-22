<?php
// StoreManagement\Router.php

namespace Pixelabs\StoreManagement;

class Router
{
    protected $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($method, $uri)
    {
        if (array_key_exists($method, $this->routes) && array_key_exists($uri, $this->routes[$method])) {
            $action = $this->routes[$method][$uri];
            $this->callAction($action);
        } else {
            // Handle 404 Not Found
            http_response_code(404);
            echo '404 Not Found';
        }
    }

    protected function callAction($action)
    {
        [$controller, $method] = $action;
        $controllerInstance = new $controller();
        $controllerInstance->$method();
    }
}
