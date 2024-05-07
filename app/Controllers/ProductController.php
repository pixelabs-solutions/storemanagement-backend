<?php 

// app\Controllers\ProductController.php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Product;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;


class ProductController
{
    private $table_name = 'products';
    public function index()
    {
        // $products = Base::get_all($this->table_name);
        // include_once __DIR__ . '/../Views/product/index.php';

        $products = Base::wc_get($this->table_name);
        print_r($products);
    }


    public function product_by_id($id)
    {
        $product = Base::wc_get_by_id($this->table_name."/".$id);

        print_r($product);
    }

    public function delete($id)
    {
        $result = Base::wc_delete_by_id($this->table_name."/".$id);
        print_r($result);
    }

    public function add()
    {
        $result = HttpRequestHelper::validate_request("POST");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }
        $data = $result["data"];
        $payload = json_encode([
            'name' => $data['name'], 
            'type' => $data['type'],
            'description' => $data['description'], 
            'manage_stock' => true,
            'stock_quantity' => $data['stock_quantity'], 
            'category' => array_map(function($category_id) {
                return ['id' => $category_id]; 
            }, $data['category']),
            'image' => array_map(function($image_url) {
                return ['src' => $image_url]; 
            }, $data['image']),
            'regular_price' => $data['regular_price'],
            'sale_price' => $data['sale_price']
        ]);

        $response = Base::wc_add($this->table_name, $payload);
        print_r($response);

    }

    public function update($id)
    {
        $result = HttpRequestHelper::validate_request("PUT");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }

        $data = $result["data"];
        $payload = json_encode([
            'name' => $data['name'], 
            'type' => $data['type'],
            'description' => $data['description'], 
            'manage_stock' => true,
            'stock_quantity' => $data['stock_quantity'], 
            'category' => array_map(function($category_id) {
                return ['id' => $category_id]; 
            }, $data['category']),
            'image' => array_map(function($image_url) {
                return ['src' => $image_url]; 
            }, $data['image']),
            'regular_price' => $data['regular_price'],
            'sale_price' => $data['sale_price']
        ]);

        $response = Base::wc_update($this->table_name."/".$id, $payload);
        print_r($response);
    }

}
