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
use Pixelabs\StoreManagement\Controllers\CategoryController;

// Define routes

//Authentication

$router->post('/authentication/register', [AuthenticationController::class, 'register']);
$router->post('/authentication/login', [AuthenticationController::class, 'login']);
$router->get('/authentication/logout', [AuthenticationController::class, 'logout']);

//Dashboard
$router->get('/index', [DashboardController::class, 'index']);


//Products
$router->get('/product', [ProductController::class, 'index']);
$router->get('product/{id}', [ProductController::class, 'product_by_id']);
$router->delete('/product/{id}', [ProductController::class, 'delete']);
$router->post('/product/add', [ProductController::class, 'add']);
$router->put('/product/{id}', [ProductController::class, 'update']);


//Coupons
$router->get('/coupons', [CouponsController::class, 'index']);
$router->post('/coupons/add', [CouponsController::class, 'add']);
$router->get('/coupons/{id}', [CouponsController::class, 'get']);
$router->delete('/coupons/{id}', [CouponsController::class, 'delete']);
$router->put('/coupons/{id}', [CouponsController::class, 'update']);


//Customers
$router->get('/customers', [CustomerController::class, 'index']);


//Goals
$router->get('/goals', [GoalsController::class, 'index']);
$router->post('/goals/add', [GoalsController::class, 'add']);


//Inventory
$router->get('/inventory', [InventoryController::class, 'index']);
$router->put('/inventory/update', [InventoryController::class, 'update']);



//Statistics
$router->get('/statistics', [StatisticsController::class, 'index']);

//Transactions
$router->get('/transactions', [TransactionController::class, 'index']);
$router->get('/transactions/{$id}', [TransactionController::class, 'get_by_id']);
$router->put('/transactions/update_status/{$id}', [TransactionController::class, 'update_status']);

//User Configurations
$router->post('/configurations/add', [ConfigurationController::class, 'add']);


//Categories
$router->get('/categories', [CategoryController::class, 'index']);
$router->get('/categories/{id}', [CategoryController::class, 'get']);
$router->delete('/categories/{id}', [CategoryController::class, 'delete']);
$router->post('/categories/add', [CategoryController::class, 'add']);
$router->put('/categories/{id}', [CategoryController::class, 'update']);

