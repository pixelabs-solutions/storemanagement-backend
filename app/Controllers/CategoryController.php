<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;

class CategoryController
{
    private $endpoint = 'products/categories';
    public function index()
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
        
        $configuration = $this->prepare_configuration($is_rest);

        $categories = Base::wc_get($configuration, $this->endpoint);
        if($is_rest == "true")
        {
            echo json_encode($categories, JSON_UNESCAPED_UNICODE);
            exit;
        }
    }

    public function get($id)
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $category = Base::wc_get_by_id($configuration, $this->endpoint."/".$id);

        if($is_rest == "true")
        {
            echo $category;
            exit;
        }
    }

    public function delete($id)
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
        
        $configuration = $this->prepare_configuration($is_rest);
        $result = Base::wc_delete_by_id($configuration, $this->endpoint."/".$id);
        echo $result;
    }

    public function add()
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
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
            'parent' => $data['parent'],
            'images' => [
                'src' => $data['image']
            ]
        ]);

        $response = Base::wc_add($configuration, $this->endpoint, $payload);
        echo $response;
    }

    public function update($id)
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
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
            'parent' => $data['parent'],
            'images' => [
                'src' => $data['image']
            ]
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