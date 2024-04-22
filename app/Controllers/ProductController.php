<?php 

// app\Controllers\ProductController.php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Product;

class ProductController
{
    public function index()
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Load the view and pass the products data
        include_once __DIR__ . '/../Views/product/index.php';
    }
}
