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
        $is_deleted = Base::delete_by_id($this->table_name, 1);
        echo $is_deleted;
        // include_once __DIR__ . '/../Views/product/index.php';
    }
}
