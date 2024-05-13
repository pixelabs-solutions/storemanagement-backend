<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Inventory;

use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;


class InventoryController
{

    public function index()
    {
        $product_settings = Base::wc_get("settings/products");
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

        include_once __DIR__ . '/../Views/inventory/settings.php';
    }

    public function update()
    {
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
        $result = Base::wc_update("settings/products/batch", $payload);

        echo $result;
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