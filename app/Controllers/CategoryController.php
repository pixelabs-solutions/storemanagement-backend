<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;

class CategoryController
{
    private $endpoint = 'products/categories';
    public function index()
    {
        $categories = Base::wc_get($this->endpoint);
        //include_once __DIR__ . '/../Views/coupons/index.php';
        echo $categories;
    }

    public function get($id)
    {
        $category = Base::wc_get_by_id($this->endpoint."/".$id);

        echo $category;
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
            'parent' => $data['parent'],
            'images' => [
                'src' => $data['image']
            ]
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
            'parent' => $data['parent'],
            'images' => [
                'src' => $data['image']
            ]
        ]);
        $response = Base::wc_update($this->endpoint."/".$id, $payload);
        echo $response;
    }
}