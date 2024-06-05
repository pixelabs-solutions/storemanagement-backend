<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Helpers\RequestTracker;

class CouponsController
{
    private $endpoint = 'coupons';
    public function index()
    {
        // RequestTracker::trackRequest();
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        $fields = ['_fields' => 'id, code, discount_type, amount, date_expires, usage_limit, usage_count'];
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $coupons = Base::wc_get($configuration, $this->endpoint, $page, $fields);
        if($is_rest == "true")
        {
            echo json_encode($coupons, JSON_UNESCAPED_UNICODE);
        }else{
            include_once __DIR__ . '/../Views/coupons/index.php';
        }
    }


    public function add()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        
        $result = HttpRequestHelper::validate_request("POST");
        // $result = $this->prepare_data("POST");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }
        
        $data = $result["data"];
        $payload = json_encode([
            'code' => $data['code'], 
            'discount_type' => $data['discount_type'],
            'amount' => $data['amount'], 
            'date_expires' => $data['date_expires'],
            'usage_limit' => $data['usage_limit']
        ]);
        $response = Base::wc_add($configuration, $this->endpoint, $payload);
        return $response;
    }

    public function get($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        $fields = ['_fields' => 'id, code, discount_type, amount, date_expires, usage_limit, usage_count'];
        $coupon = Base::wc_get_by_id($configuration, $this->endpoint."/".$id, $fields);
        echo $coupon;
    }


    public function delete($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        
        $configuration = $this->prepare_configuration($is_rest);


        $result = Base::wc_delete_by_id($configuration, $this->endpoint."/".$id);
        echo $result;
    }

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
        $payload = json_encode([
            'code' => $data['code'], 
            'discount_type' => $data['discount_type'],
            'amount' => $data['amount'], 
            'date_expires' => $data['date_expires'],
            'usage_limit' => $data['usage_limit']
        ]);
        $response = Base::wc_update($configuration, $this->endpoint."/".$id, $payload);
        echo $response;
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
