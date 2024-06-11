<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Models\Category;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Product;
use Pixelabs\StoreManagement\Models\Attribute;
use Pixelabs\StoreManagement\Models\Currency;
use Pixelabs\StoreManagement\Models\Authentication;

class SynchronizationController
{
    public function sync_data()
    {
        $tables = ['products', 'attributes', 'categories', 'currencies'];
        
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
        
        $product_fields = ['_fields' => 'id, name, images, categories, regular_price, sale_price, stock_quantity, description, type, attributes, variations'];
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