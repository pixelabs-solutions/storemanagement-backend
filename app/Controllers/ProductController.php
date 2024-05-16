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
        $products = Base::wc_get($this->table_name);
        if(isset($_GET['category']) && $_GET['category'] !== "")
        {
            $category = $_GET['category'];
            $filteredProducts = [];
            foreach ($products as $product) {
                $categories = $product['categories'];
                $categorySlugs = array_column($categories, 'id');
                if (in_array($category, $categorySlugs)) {
                    $filteredProducts[] = $product;
                }
            }
            $products = $filteredProducts;
        }
        $categories = Base::wc_get('products/categories');
        $currency = Base::wc_get('data/currencies/current');
        $number_of_products = Product::get_products_count();
        include_once __DIR__ . '/../Views/product/index.php';
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
        $payload = [
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
        ];

        if($data['type'] === "variable")
        {
            // Construct attributes array
            $attributes = [];
            foreach ($data['attributes_names'] as $index => $name) {
                $attribute = [
                    'name' => $name,
                    'options' => $data['attributes_options'][$index],
                    'variation' => true
                ];
                $attributes[] = $attribute;
            }
            $payload['attributes'] = $attributes;
            
            $variations = $this->generateVariations($data['attributes_options'], $data['attributes_names'], $data['regular_price']);
            $payload['variations'] = $variations;

            echo json_encode($payload);

           $response = Base::wc_add($this->table_name, json_encode($payload));
            

            foreach ($variations as $variationData) {
                Product::createProductVariation($response['data_id'], $variationData);
            }

        }
        else
        {
            $response = Base::wc_add($this->table_name, json_encode($payload));
            print_r($response);
        }

    }
    

    private function generateVariations($options, $names, $regularPrice, $index = 0, $currentAttributes = [], &$variations = [])
    {
        $currentOptions = $options[$index];
        foreach ($currentOptions as $option) {
            $currentAttributes[$names[$index]] = $option;
            if ($index === count($options) - 1) {
                $variation = [
                    'regular_price' => $regularPrice,
                    'attributes' => array_map(function ($name, $option) {
                        return ['name' => ucfirst($name), 'option' => $option];
                    }, array_keys($currentAttributes), $currentAttributes)
                ];
                $variations[] = $variation;
            } else {
                $this->generateVariations($options, $names, $regularPrice, $index + 1, $currentAttributes, $variations);
            }
        }
        return $variations;
    }

    // public function update($id)
    // {
    //     $result = HttpRequestHelper::validate_request("PUT");
    //     if(!$result["is_data_prepared"])
    //     {
    //         echo $result["message"];
    //         return;
    //     }

    //     $data = $result["data"];
    //     $payload = [
    //         'name' => $data['name'], 
    //         'type' => $data['type'],
    //         'description' => $data['description'], 
    //         'manage_stock' => true,
    //         'stock_quantity' => $data['stock_quantity'], 
    //         'category' => array_map(function($category_id) {
    //             return ['id' => $category_id]; 
    //         }, $data['category']),
    //         'image' => array_map(function($image_url) {
    //             return ['src' => $image_url]; 
    //         }, $data['image']),
    //         'regular_price' => $data['regular_price'],
    //         'sale_price' => $data['sale_price']
    //     ];

    //     $response = Base::wc_update($this->table_name."/".$id, $payload);
    //     print_r($response);
    // }

    public function update($id)
    {
        $result = HttpRequestHelper::validate_request("PUT");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }

        $data = $result["data"];
        $payload = [
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
        ];

        if($data['type'] === "variable")
        {
            // Construct attributes array
            $attributes = [];
            foreach ($data['attributes_names'] as $index => $name) {
                $attribute = [
                    'name' => $name,
                    'options' => $data['attributes_options'][$index],
                    'variation' => true
                ];
                $attributes[] = $attribute;
            }
            $payload['attributes'] = $attributes;
            
            $variations = $this->generateVariations($data['attributes_options'], $data['attributes_names'], $data['regular_price']);
            $payload['variations'] = $variations;

            $response = Base::wc_update($this->table_name."/".$id, $payload);

            foreach ($variations as $variationData) {
                Product::createProductVariation($id, $variationData); // Update variations
            }
        }
        else
        {
            $response = Base::wc_update($this->table_name."/".$id, $payload);
        }

        print_r($response);
    }


}
