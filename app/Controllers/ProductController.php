<?php 

// app\Controllers\ProductController.php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Product;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Helpers\FileHelper;


class ProductController
{
    private $table_name = 'products';
    public function index()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $product_fields = 
        [
            '_fields' => 'id, name, images, categories, regular_price, sale_price, stock_quantity, description, type, attributes, variations'
        ];
        $products = Base::wc_get($configuration, $this->table_name, $product_fields);
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

        if(isset($_GET['inventory_from']) && $_GET['inventory_from'] !== "" &&
            isset($_GET['inventory_to']) && $_GET['inventory_to'] !== "")
            {
                $inventory_from = intval($_GET['inventory_from']);
                $inventory_to = intval($_GET['inventory_to']);
                $filteredProducts = [];
                foreach ($products as $product) {
                    if(isset($product['stock_quantity']) && is_numeric($product['stock_quantity'])) {
                        $stock_quantity = intval($product['stock_quantity']);
                        if ($stock_quantity >= $inventory_from && $stock_quantity <= $inventory_to) {
                            $filteredProducts[] = $product;
                        }
                    }
                }
                $products = $filteredProducts;
            }
        $category_fields = ['_fields' => 'id, name, parent, image, count'];
        $categories = Base::wc_get($configuration,'products/categories', $category_fields);
        $attributes = Base::wc_get($configuration, 'products/attributes');
        $currency = Base::wc_get($configuration, 'data/currencies/current');
        
        $number_of_products = Product::get_products_count($configuration);
        // var_dump($products);
        if($is_rest == 'true')
        {
            $data = [
                'products' => $products,
                'categories' => $categories,
                'attributes' => $attributes,
                'currency' => $currency,
                'number_of_products' => $number_of_products
            ];
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        else{
            include_once __DIR__ . '/../Views/product/index.php';
        }
    }


    public function product_by_id($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        $product_fields = 
        [
            '_fields' => 'id, name, images, categories, regular_price, sale_price, stock_quantity, description, type, attributes, variations'
        ];
        $product = Base::wc_get_by_id($configuration, $this->table_name."/".$id, $product_fields);

        echo $product;
    }

    public function delete($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $result = Base::wc_delete_by_id($configuration, $this->table_name."/".$id);
        echo $result;
    }

    public function add()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $result = HttpRequestHelper::validate_request("POST");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }
        $data = $result["data"];

        $image_paths = [];
        if (is_array($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $filename = "products/".$data['name']."_".$key;
                $image_paths[] = FileHelper::save_file($image, $filename);
            }
        } 
        else {
            $image_paths[] = FileHelper::save_file($data['image'], "products/".$data['name']);
        }

        $payload = [
            'name' => $data['name'], 
            'type' => $data['type'],
            'description' => $data['description'], 
            'manage_stock' => true,
            'stock_quantity' => $data['stock_quantity'], 
            'categories' => array_map(function($category_id) {
                return ['id' => $category_id]; 
            }, $data['category']),
            'images' => array_map(function($image_url) {
                return ['src' => $image_url]; 
            }, $data['images']),
            'regular_price' => $data['regular_price'],
            'sale_price' => $data['sale_price']
        ];
        // echo json_encode($payload);exit;
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

           $response = Base::wc_add($configuration, $this->table_name, json_encode($payload));
            if($is_rest == 'true')
            {
                echo $response;
            }

            foreach ($variations as $variationData) {
                Product::createProductVariation($configuration, $response['data_id'], $variationData);
            }

        }
        else
        {
            $response = Base::wc_add($configuration, $this->table_name, json_encode($payload));
            if($is_rest == 'true')
            {
                echo $response;
            }
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
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $result = HttpRequestHelper::validate_request("PUT");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }

        $data = $result["data"];

        $image_paths = [];
        if (is_array($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $filename = "products/".$data['name']."_".$key;
                $image_paths[] = FileHelper::save_file($image, $filename);
            }
        } 
        else {
            $image_paths[] = FileHelper::save_file($data['image'], "products/".$data['name']);
        }

        
        $payload = [
            'name' => $data['name'], 
            'type' => $data['type'],
            'description' => $data['description'], 
            'manage_stock' => true,
            'stock_quantity' => $data['stock_quantity'], 
            'categories' => array_map(function($category_id) {
                return ['id' => $category_id]; 
            }, $data['category']),
            'images' => array_map(function($image_url) {
                return ['src' => $image_url]; 
            }, $data['images']),
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

            $response = Base::wc_update($configuration, $this->table_name."/".$id, $payload);

            foreach ($variations as $variationData) {
                Product::createProductVariation($configuration, $id, $variationData); // Update variations
            }
        }
        else
        {
            $response = Base::wc_update($configuration, $this->table_name."/".$id, $payload);
        }
        if($is_rest == 'true'){
            echo $response;
        }
    }

    public function prepare_configuration($is_rest){
        $response = Configuration::getConfiguration($is_rest);
        $result = json_decode($response, true);
        if ($is_rest && $result['status_code'] != 200) {
            echo $response;
            exit;
        }
        
        return $result['data'];
    }


}
