<?php

namespace Pixelabs\StoreManagement\Services;

use Pixelabs\StoreManagement\Models\Category;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Product;
use Pixelabs\StoreManagement\Models\Base;

class CronJobService
{
    public static function store_products_in_db(){
        //Get products from woocommerce
        $product_fields =
        [
            '_fields' => 'id, name, images, categories, regular_price, sale_price, stock_quantity, description, type, attributes, variations, date_created'
        ];
        $configuration = self::prepare_configuration('true');
        $products = Product::get_products($configuration, "products", $product_fields);

        //store in database
        try
        {
            foreach ($products as $product) {
                Product::store_product($product);
            }
        }
        catch(\Exception $e) {
            echo "Error fetching products: " . $e->getMessage() . "\n";
        }
        
    }


    public static function store_categories_in_db(){
        //Get categories from woocommerce
        // $fields = ['_fields' => 'id, name, parent, image, count'];
        $configuration = self::prepare_configuration('true');
        // $categories = Base::wc_get($configuration, "products/categories", []);
        $categories = Category::get_categories($configuration, 'products/categories');
        // echo json_encode($categories);exit;


        //store in database
        try
        {
            foreach ($categories as $category) {
                Category::store_category($category);
            }
        }
        catch(\Exception $e) {
            echo "Error fetching categories: " . $e->getMessage() . "\n";
        }
        
    }



    public static function prepare_configuration($is_rest){
        $response = Configuration::getConfiguration($is_rest);
        $result = json_decode($response, true);
        if ($is_rest && $result['status_code'] != 200) {
            echo $response;
            exit;
        }
        
        return $result['data'];
    }
}