<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;

class CouponsController
{
    private $endpoint = 'coupons';
    public function index()
    {
        $coupons = Base::wc_get($this->endpoint);
        //include_once __DIR__ . '/../Views/coupons/index.php';
        print_r($coupons);
    }


    public function add()
    {
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

        $response = Base::wc_add($this->endpoint, $payload);
        print_r($response);
    }

    public function get($id)
    {
        $coupon = Base::wc_get_by_id($this->endpoint."/".$id);

        print_r($coupon);
    }


    public function delete($id)
    {
        $result = Base::wc_delete_by_id($this->endpoint."/".$id);
        print_r($result);
    }

    public function update($id)
    {
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
        $response = Base::wc_update($this->endpoint."/".$id, $payload);
        print_r($response);
    }

}
