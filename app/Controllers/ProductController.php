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
        var_dump($products, true);
    }


    public function product_by_id($id)
    {
        $product = Product::get_product_by_id($id);

        print_r($product);
    }

    public function delete($id)
    {
        $result = Product::delete($id);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            http_response_code(405);
            echo "Invalid request type. Only POST method is accepted.";
            return;
        }

        
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);

        if (is_null($data)) {
            echo "Invalid JSON data.";
            return;
        }

        $result = Product::add($data);

        print_r($result);

    }

}
