<?php

namespace Pixelabs\StoreManagement;

class Router
{
    protected $routes = [];

    public function get($uri, $action)
    {
        $this->register('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        $this->register('POST', $uri, $action);
    }

    public function delete($uri, $action)
    {
        $this->register('DELETE', $uri, $action);
    }

    public function put($uri, $action)
    {
        $this->register('PUT', $uri, $action);
    }

    protected function register($method, $uri, $action)
    {
        $uri = $this->convertToRegex($uri);
        $this->routes[$method][$uri] = $action;
    }

    public function dispatch($method, $uri)
    {
        if (!array_key_exists($method, $this->routes)) {
            return $this->sendNotFound();
        }

        foreach ($this->routes[$method] as $pattern => $action) {
            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // Remove the full match
                return $this->callAction($action, $matches);
            }
        }

        return $this->sendNotFound();
    }


    protected function callAction($action, $params = [])
    {
        [$controller, $method] = $action;
        $controllerInstance = new $controller();
        $controllerInstance->$method(...$params);
    }

    protected function convertToRegex($uri)
    {
        // Make sure the URI starts with a slash
        if ($uri[0] !== '/') {
            $uri = '/' . $uri;
        }
        $uri = preg_replace('/\{([^\/]+)\}/', '([^/]+)', $uri);
        return '#^' . $uri . '$#';
    }



    protected function sendNotFound()
    {
        http_response_code(404);
        echo '404 Not Found';
    }
}
