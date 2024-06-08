<?php

namespace Pixelabs\StoreManagement\Controllers;


use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Authentication;


class InventoryController
{

    public function index()
    {
        $user_level = Authentication::getUserLevelFromToken();
        if ($user_level == ADMIN) {
            header("Location: /admin/index");
            } else {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $product_settings = Base::wc_get($configuration, "settings/products", 1);
        $inventory_settings_ids =
            [
                'woocommerce_stock_email_recipient',
                'woocommerce_manage_stock',
                'woocommerce_notify_low_stock_amount',
                'woocommerce_notify_no_stock_amount',
                'woocommerce_notify_low_stock',
                'woocommerce_notify_no_stock'
            ];
        $inventory_settings = [];
        foreach ($product_settings as $setting) {
            if (in_array($setting['id'], $inventory_settings_ids)) {
                array_push(
                    $inventory_settings,
                    [
                        'id' => $setting['id'],
                        'value' => $setting['value']
                    ]
                );
            }
        }
        if($is_rest == "true")
        {
            echo json_encode($inventory_settings, JSON_UNESCAPED_UNICODE);
        }else{
            include_once __DIR__ . '/../Views/inventory/settings.php';
        }}
    }

    public function update()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $result = HttpRequestHelper::validate_request("PUT");
        if (!$result["is_data_prepared"]) {
            echo $result["message"];
            return;
        }

        $data = $result["data"];
        $payload = json_encode(
            [
                'update' => [
                    [
                        "id" => "woocommerce_stock_email_recipient",
                        "value" => $data['woocommerce_stock_email_recipient']
                    ],
                    [
                        "id" => "woocommerce_manage_stock",
                        "value" => $data['woocommerce_manage_stock']
                    ],
                    [
                        "id" => "woocommerce_notify_low_stock_amount",
                        "value" => $data['woocommerce_notify_low_stock_amount']
                    ],
                    [
                        "id" => "woocommerce_notify_no_stock_amount",
                        "value" => $data['woocommerce_notify_no_stock_amount']
                    ],
                    [
                        "id" => "woocommerce_notify_low_stock",
                        "value" => $data['woocommerce_notify_low_stock']
                    ],
                    [
                        "id" => "woocommerce_notify_no_stock",
                        "value" => $data['woocommerce_notify_no_stock']
                    ]
                ]
            ]
        );
        $result = Base::wc_update($configuration, "settings/products/batch", $payload);

        echo $result;
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

    // public function update()
    // {
    //     $result = $this->prepare_data("PUT");
    //     if(!$result["is_data_prepared"])
    //     {
    //         echo $result["message"];
    //         return;
    //     }

    //     $data = $result["data"];
    //     $result = Inventory::update($data);

    //     echo $result;
    // }
}