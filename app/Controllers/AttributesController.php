<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;

class AttributesController
{

    private $endpoint = 'products/attributes';

    public function index()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $attributes = Base::wc_get($configuration, $this->endpoint, $page);
        if($is_rest == 'true')
        {
            echo json_encode($attributes);
        }
        else{
            include_once __DIR__ . '/../Views/product/index.php';
        }
    }

    public function get($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $attribute = Base::wc_get_by_id($configuration, $this->endpoint."/".$id);

        echo $attribute;
    }

    public function delete($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $result = Base::wc_delete_by_id($configuration, $this->endpoint."/".$id);
        echo $result;
    }


    public function add()
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
        $payload = json_encode([
            'name' => $data['name'],
            // 'slug' => $data['slug'],
            'type' => $data['type'],
            // 'order_by' => $data['order_by'],
            // 'has_archives' => $data['has_archives']
        ]);

        $response = Base::wc_add($configuration, $this->endpoint, $payload);
        echo $response;
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
            'name' => $data['name'], 
            'type' => $data['type']
        ]);
        $response = Base::wc_update($configuration, $this->endpoint."/".$id, $payload);
        echo $response;
    }

    

    public function term_index($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $attribute_terms = Base::wc_get($configuration, $this->endpoint."/".$id."/"."terms", $page);
        //include_once __DIR__ . '/../Views/coupons/index.php';
        echo $attribute_terms;
    }

    
    public function term_get($id, $term_id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        // if(isset($_GET['term_id'])){
        //     $term_id = $_GET['term_id'];

        // }
        $attribute_terms_by_id = Base::wc_get_by_id($configuration, $this->endpoint."/".$id."/"."terms"."/".$term_id);

        echo $attribute_terms_by_id;
    }


    public function term_delete($id, $term_id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $result = Base::wc_delete_by_id($configuration, $this->endpoint."/".$id."/"."terms"."/".$term_id);
        echo $result;
    }


    public function term_add($id)
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
        $payload = json_encode([
            'name' => $data['name']
        ]);

        $response = Base::wc_add($configuration, $this->endpoint."/".$id."/"."terms", $payload);
        echo $response;
    }

    public function term_update($id, $term_id)
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
            'name' => $data['name'],
            'slug' => $data['name']
        ]);
        $response = Base::wc_update($configuration, $this->endpoint."/".$id."/"."terms"."/".$term_id, $payload);
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