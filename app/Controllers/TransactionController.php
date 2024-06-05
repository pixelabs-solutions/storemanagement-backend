<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Models\Transaction;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;


class TransactionController
{
    public function index()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        $fields = ['_fields' => 'id, status, total, shipping_total, date_created, total, billing, meta_data, line_items'];
        $transactions = Base::wc_get($configuration, "orders", $fields);
        if($is_rest == "true")
        {
            echo json_encode($transactions, JSON_UNESCAPED_UNICODE);
        }else{
            include_once __DIR__ . '/../Views/transaction/index.php';
        }
        // var_dump($transactions);
    }


    public function admin()
    {
      
            include_once __DIR__ . '/../Views/admin/index.php';
 
    }

    public function get_by_id($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        $fields = ['_fields' => 'id, status, date_created, total, billing, meta_data, line_items'];
        $transaction = Base::wc_get_by_id($configuration, "orders/{$id}", $fields);
        
        echo $transaction;
    }

    public function update_status($id)
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

        $payload = json_encode([
            'status' => $data["status"]
        ]);

        $result = Base::wc_update($configuration, "orders/{$id}", $payload);

        echo $result;
    }


    public function update_bulk_status()
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

        $updateArray = [];

        foreach ($data['id'] as $id) {
            $updateArray[] = [
                'id' => $id,
                'status' => $data['status']
            ];
        }

        $updateData = ['update' => $updateArray];
        

        $payload = json_encode($updateData);
        return Transaction::update_bulk_status($configuration, $payload);
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