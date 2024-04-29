<?php 

// app\Controllers\ProductController.php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Product;
use Pixelabs\StoreManagement\Models\Base;


class ProductController
{
    private $table_name = 'products';
    public function index()
    {
        // $products = Base::get_all($this->table_name);
        // include_once __DIR__ . '/../Views/product/index.php';

        $products = Product::get_products();
        echo print_r($products, true);
    }
}
