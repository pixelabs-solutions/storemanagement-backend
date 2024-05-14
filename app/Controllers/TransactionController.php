<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Models\Transaction;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;


class TransactionController
{
    public function index()
    {
        $transactions = Base::wc_get("orders");
        var_dump($transactions);
        include_once __DIR__ . '/../Views/transaction/index.php';
    }


    public function get_by_id($id)
    {
        $transaction = Base::wc_get_by_id("orders/{$id}");
        echo $transaction;
    }

    public function update_status($id)
    {
        $result = HttpRequestHelper::validate_request("PUT");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        } 

        $data = $result["data"];

        $payload = json_encode([
            'status' => $data["status"]
        ]);

        $result = Base::wc_update("orders/{$id}", $payload);

        echo $result;
    }


    public function update_bulk_status()
    {
        $result = HttpRequestHelper::validate_request("POST");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }

        $data = $result["data"];
        $batchPayload = [];

        foreach ($data['id'] as $orderId) {
            $updatePayload = [
                'update' => [
                    'id' => $orderId,
                    'status' => $data['status']
                ]
            ];

            $batchPayload[] = $updatePayload;
        }

        $payload = json_encode($batchPayload);
        return Transaction::update_bulk_status($payload);
    }
}