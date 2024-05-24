<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Goal;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;


class GoalsController
{
    public function index()
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $goals_data = Goal::get_goals($configuration);
        if($is_rest == "true")
        {
            echo json_encode($goals_data, JSON_UNESCAPED_UNICODE);
        }
        else{
            include_once __DIR__ . '/../Views/goals/index.php';
        }
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


        $result = Goal::add($data);
        // echo $result;
    }

    public function put()
    {
        $result = HttpRequestHelper::validate_request("PUT");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }
        
        $data = $result["data"];


        $result = Goal::update($data);
        echo $result;
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