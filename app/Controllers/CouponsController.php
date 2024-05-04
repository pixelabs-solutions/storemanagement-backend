<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;

class CouponsController
{
    private $table_name = 'coupons';
    public function index()
    {
        $coupons = Base::wc_get($this->table_name);
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

        $response = Base::wc_add($this->table_name, $payload);
        print_r($response);
    }

    public function get($id)
    {
        $coupon = Base::wc_get_by_id($this->table_name, $id);

        print_r($coupon);
    }


    public function delete($id)
    {
        $result = Base::wc_delete_by_id($this->table_name, $id);
        print_r($result);
    }

    public function update($id)
    {
        $result = HttpRequestHelper::validate_request("PATCH");
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
        $response = Base::wc_update($this->table_name, $payload, $id);
        print_r($response);
    }

}
