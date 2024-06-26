<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Models\Transaction;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Authentication;
use Pixelabs\StoreManagement\Models\Synchronize;
use Pixelabs\StoreManagement\Models\Currency;


class TransactionController
{
    public function index()
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

        $user_level = Authentication::getUserLevelFromToken();
        if ($user_level == ADMIN) {
            header("Location: /admin/index");
            } else {
     
        $transactions = Transaction::get_all_transactions($user_id);
        $currency = Currency::get_current_currency($user_id); 
        if($is_rest == "true")
        {
            echo json_encode($transactions, JSON_UNESCAPED_UNICODE);
        }else{
            include_once __DIR__ . '/../Views/transaction/index.php';
        }
        // var_dump($transactions);
    }
    }

    public function admin()
    {
      
            include_once __DIR__ . '/../Views/admin/index.php';
 
    }

    public function get_by_id($id)
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
        $transaction = Transaction::get_transaction_by_id($id);
        
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
        Synchronize::sync_transactions();

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