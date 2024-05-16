<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;

class AttributesController
{

    private $endpoint = 'products/attributes';

    public function index()
    {
        $attributes = Base::wc_get($this->endpoint);
        include_once __DIR__ . '/../Views/product/index.php';
        echo $attributes;
    }

    public function get($id)
    {
        $attribute = Base::wc_get_by_id($this->endpoint."/".$id);

        echo $attribute;
    }

    public function delete($id)
    {
        $result = Base::wc_delete_by_id($this->endpoint."/".$id);
        echo $result;
    }


    public function add()
    {
        $result = HttpRequestHelper::validate_request("POST");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }

        $data = $result["data"];
        $payload = json_encode([
            'name' => $data['name'],
            // 'slug' => $data['slug'],
            'type' => $data['type'],
            // 'order_by' => $data['order_by'],
            // 'has_archives' => $data['has_archives']
        ]);

        $response = Base::wc_add($this->endpoint, $payload);
        echo $response;
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
            'name' => $data['name'], 
            'type' => $data['type']
        ]);
        $response = Base::wc_update($this->endpoint."/".$id, $payload);
        echo $response;
    }

    

    public function term_index($id)
    {
        $attribute_terms = Base::wc_get($this->endpoint."/".$id."/"."terms");
        //include_once __DIR__ . '/../Views/coupons/index.php';
        echo $attribute_terms;
    }

    
    public function term_get($id, $term_id)
    {
        // if(isset($_GET['term_id'])){
        //     $term_id = $_GET['term_id'];

        // }
        $attribute_terms_by_id = Base::wc_get_by_id($this->endpoint."/".$id."/"."terms"."/".$term_id);

        echo $attribute_terms_by_id;
    }


    public function term_delete($id, $term_id)
    {
        $result = Base::wc_delete_by_id($this->endpoint."/".$id."/"."terms"."/".$term_id);
        echo $result;
    }


    public function term_add($id)
    {
        $result = HttpRequestHelper::validate_request("POST");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }

        $data = $result["data"];
        $payload = json_encode([
            'name' => $data['name']
        ]);

        $response = Base::wc_add($this->endpoint."/".$id."/"."terms", $payload);
        echo $response;
    }

    public function term_update($id, $term_id)
    {
        $result = HttpRequestHelper::validate_request("PUT");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }

        $data = $result["data"];
        $payload = json_encode([
            'name' => $data['name'],
            'slug' => $data['name']
        ]);
        $response = Base::wc_update($this->endpoint."/".$id."/"."terms"."/".$term_id, $payload);
        echo $response;
    }

}