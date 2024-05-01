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

// Define routes

//Authentication

$router->post('/authentication/register', [AuthenticationController::class, 'register']);
$router->post('/authentication/login', [AuthenticationController::class, 'login']);
$router->get('/authentication/logout', [AuthenticationController::class, 'logout']);

//Dashboard
$router->get('/', [DashboardController::class, 'index']);


//Products
$router->get('/product', [ProductController::class, 'index']);


//Coupons
$router->get('/coupons', [CouponsController::class, 'index']);


//Customers
$router->get('/customers', [CustomerController::class, 'index']);


//Goals
$router->get('/goals', [GoalsController::class, 'index']);


//Inventory
$router->get('/inventory', [InventoryController::class, 'index']);


//Statistics
$router->get('/statistics', [StatisticsController::class, 'index']);

//Transactions
$router->get('/transactions', [TransactionController::class, 'index']);

