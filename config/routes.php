<?php
// config/routes.php

$router = $app->getRouter();


use Pixelabs\StoreManagement\Controllers\ProductController;
use Pixelabs\StoreManagement\Controllers\CouponsController;
use Pixelabs\StoreManagement\Controllers\CustomerController;
use Pixelabs\StoreManagement\Controllers\DashboardController;
use Pixelabs\StoreManagement\Controllers\GoalsController;
use Pixelabs\StoreManagement\Controllers\InventoryController;
use Pixelabs\StoreManagement\Controllers\StatisticsController;
use Pixelabs\StoreManagement\Controllers\TransactionController;
use Pixelabs\StoreManagement\Controllers\AuthenticationController;
use Pixelabs\StoreManagement\Controllers\ConfigurationController;

// Define routes

//Authentication

$router->post('/authentication/register', [AuthenticationController::class, 'register']);
$router->post('/authentication/login', [AuthenticationController::class, 'login']);
$router->get('/authentication/logout', [AuthenticationController::class, 'logout']);

//Dashboard
$router->get('/', [DashboardController::class, 'index']);


//Products
$router->get('/product', [ProductController::class, 'index']);
$router->get('product/{id}', [ProductController::class, 'product_by_id']);
$router->delete('/product/{id}', [ProductController::class, 'delete']);
$router->post('/product/add', [ProductController::class, 'add']);



//Coupons
$router->get('/coupons', [CouponsController::class, 'index']);
$router->post('/coupons/add', [CouponsController::class, 'add']);
$router->get('/coupons/{id}', [CouponsController::class, 'get']);
$router->delete('/coupons/{id}', [CouponsController::class, 'delete']);
$router->patch('/coupons/{id}', [CouponsController::class, 'update']);


//Customers
$router->get('/customers', [CustomerController::class, 'index']);


//Goals
$router->get('/goals', [GoalsController::class, 'index']);


//Inventory
$router->get('/inventory', [InventoryController::class, 'index']);
$router->post('/inventory/add', [InventoryController::class, 'add']);
$router->patch('/inventory/update', [InventoryController::class, 'update']);



//Statistics
$router->get('/statistics', [StatisticsController::class, 'index']);

//Transactions
$router->get('/transactions', [TransactionController::class, 'index']);

//User Configurations
$router->post('/configurations/add', [ConfigurationController::class, 'add']);

