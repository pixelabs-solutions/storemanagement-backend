<?php
// config/routes.php

$router = $app->getRouter();

use Pixelabs\StoreManagement\Controllers\ProductController;

// Define routes
$router->get('/products', [ProductController::class, 'index']);

