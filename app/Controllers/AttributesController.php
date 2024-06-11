<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Authentication;
use Pixelabs\StoreManagement\Models\Attribute;

class AttributesController
{

    private $endpoint = 'products/attributes';

    public function index()
    {
        $user_level = Authentication::getUserLevelFromToken();
        if ($user_level == ADMIN) {
            header("Location: /admin/index");
            } else {
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
    }}

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
        $payload = [
            'name' => $data['name'],
            'type' => $data['type']
        ];

        $response = Attribute::add($configuration, $payload);
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
        // include_once __DIR__ . '/../Views/product/index.php';
     
        // Ensure headers are set to return JSON
        header('Content-Type: application/json');
        
        // Output the JSON encoded attribute terms
        echo json_encode($attribute_terms);
        //    return json_encode($attribute_terms);
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
            'data' => $data['data']
        ]);

        $response = Attribute::add_term($configuration, $payload, $id, $data['name']);
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