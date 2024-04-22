<?php
// StoreManagement\Application.php

namespace Pixelabs\StoreManagement;

use Pixelabs\StoreManagement\Router;

class Application
{
    protected $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function get($uri, $action)
    {
        $this->router->get($uri, $action);
    }

    public function post($uri, $action)
    {
        $this->router->post($uri, $action);
    }

    public function getRouter()
    {
        return $this->router;
    }

    public function run()
    {
        // Dispatch the current request to the router
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->router->dispatch($method, $uri);
    }
}
