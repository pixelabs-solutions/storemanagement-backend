<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class Synchronize{
    public static function sync_transactions(){
        $tables = ['transactions'];
        
        $user_id = Authentication::getUserIdFromToken();

        if($user_id === null)
        {
            http_response_code(401);
            echo json_encode(array(
                "message" => "User not authenticated",
                "status_code" => 401
            ));
            exit;
        }
        Base::truncate_table($tables, $user_id);
        $configuration = self::prepare_configuration();
        $transaction_fields = ['_fields' => 'id, status, total, shipping_total, customer_id, date_created, total, billing, meta_data, line_items'];
        $transactions = Base::wc_get($configuration, "orders", $transaction_fields);
        Transaction::store_transactions($transactions, $user_id);
        echo "done";
 
    }

    public static function sync_inventory_settings(){
        $tables = ['inventory_settings'];
        
        $user_id = Authentication::getUserIdFromToken();

        if($user_id === null)
        {
            http_response_code(401);
            echo json_encode(array(
                "message" => "User not authenticated",
                "status_code" => 401
            ));
            exit;
        }
        Base::truncate_table($tables, $user_id);
        $configuration = self::prepare_configuration();
        $inventory_settings = Base::wc_get($configuration, "settings/products");
        Inventory::store_inventory_settings($inventory_settings, $user_id);
        echo "done";
 
    }

    public static function sync_coupons(){
        $tables = ['coupons'];
        
        $user_id = Authentication::getUserIdFromToken();

        if($user_id === null)
        {
            http_response_code(401);
            echo json_encode(array(
                "message" => "User not authenticated",
                "status_code" => 401
            ));
            exit;
        }
        Base::truncate_table($tables, $user_id);
        $configuration = self::prepare_configuration();
        $coupons_fields = ['_fields' => 'id, code, date_expires, discount_type, usage_limit, usage_count, amount'];
        $coupons = Base::wc_get($configuration, "coupons", $coupons_fields);
        Coupon::store_coupons($coupons, $user_id);
        echo "done";
 
    }


    public static function sync_categories(){
        $tables = ['categories'];
        
        $user_id = Authentication::getUserIdFromToken();

        if($user_id === null)
        {
            http_response_code(401);
            echo json_encode(array(
                "message" => "User not authenticated",
                "status_code" => 401
            ));
            exit;
        }
        Base::truncate_table($tables, $user_id);
        $configuration = self::prepare_configuration();
        $category_fields = ['_fields' => 'id, name, parent, image, count'];
        $categories = Base::wc_get($configuration, "products/categories", $category_fields);
        Category::store_categories($categories, $user_id);
        echo "done";
 
    }

    public static function sync_products(){
        $tables = ['products'];
        
        $user_id = Authentication::getUserIdFromToken();

        if($user_id === null)
        {
            http_response_code(401);
            echo json_encode(array(
                "message" => "User not authenticated",
                "status_code" => 401
            ));
            exit;
        }
        Base::truncate_table($tables, $user_id);
        $configuration = self::prepare_configuration();
        $product_fields = ['_fields' => 'id, name, images, categories, regular_price, sale_price, stock_quantity, description, type, attributes, variations, date_created'];
        $products = Base::wc_get($configuration, "products", $product_fields);
        Product::store_products($products, $user_id);
        echo "done";
 
    }

    public static function prepare_configuration()
    {
        $response = Configuration::getConfiguration("true");
        $result = json_decode($response, true);
        if ($result['status_code'] != 200) {
            echo $response;
            exit;
        }

        return $result['data'];
    }

}