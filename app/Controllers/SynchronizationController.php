<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Models\Category;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Product;
use Pixelabs\StoreManagement\Models\Attribute;
use Pixelabs\StoreManagement\Models\Currency;
use Pixelabs\StoreManagement\Models\Authentication;
use Pixelabs\StoreManagement\Models\Transaction;
use Pixelabs\StoreManagement\Models\Customer;
use Pixelabs\StoreManagement\Models\Coupon;
use Pixelabs\StoreManagement\Models\Inventory;


class SynchronizationController
{
    public function sync_data()
    {

        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $user_id = Authentication::getUserIdFromToken();
        if($user_id === null)
        {
            if ($is_rest == 'true') {
                http_response_code(401);
                echo json_encode(array(
                    "message" => "User not authenticated",
                    "status_code" => 401
                ));
                exit;
            }
            else{
                header('Location: /authentication/login');
            }
        }
        
        $tables = ['products', 'attributes', 'categories', 'currencies', 'transactions', 'customers', 'coupons', 'inventory_settings'];
        
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
        $configuration = $this->prepare_configuration();
        
        $product_fields = ['_fields' => 'id, name, images, categories, regular_price, sale_price, stock_quantity, description, type, attributes, variations, date_created'];
        $products = Base::wc_get($configuration, "products", $product_fields);
        Product::store_products($products, $user_id);

        $category_fields = ['_fields' => 'id, name, parent, image, count'];
        $categories = Base::wc_get($configuration, "products/categories", $category_fields);
        Category::store_categories($categories, $user_id);

        $attribute_fields = ['_fields' => 'id, name, type'];
        $attributes = Base::wc_get($configuration, "products/attributes", $attribute_fields);
        Attribute::store_attributes($attributes, $user_id);

        $currency_fields = ['_fields' => 'code, name, symbol'];
        $currency = Base::wc_get($configuration, "data/currencies/current", $currency_fields);
        Currency::store_currencies($currency, $user_id);

        $transaction_fields = ['_fields' => 'id, status, total, shipping_total, customer_id, date_created, total, billing, meta_data, line_items'];
        $transactions = Base::wc_get($configuration, "orders", $transaction_fields);
        Transaction::store_transactions($transactions, $user_id);

        $customers_fields = ['_fields' => 'id, first_name, last_name, email'];
        $customers = Base::wc_get($configuration, "customers", $customers_fields);
        Customer::store_customers($customers, $user_id);

        $coupons_fields = ['_fields' => 'id, code, date_expires, discount_type, usage_limit, usage_count, amount'];
        $coupons = Base::wc_get($configuration, "coupons", $coupons_fields);
        Coupon::store_coupons($coupons, $user_id);

        $inventory_settings = Base::wc_get($configuration, "settings/products");
        Inventory::store_inventory_settings($inventory_settings, $user_id);

        $current_date_time = date('Y-m-d H:i:s');
        Authentication::update_user_meta($user_id, "last_sync_datetime", $current_date_time);

        echo "done";

    }


    

    public function prepare_configuration()
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