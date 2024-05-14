<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Goal;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;


class GoalsController
{
    public function index()
    {
        $data = Base::get_all("goals");
        // print_r($data);
        include_once __DIR__ . '/../Views/goals/index.php';
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
        echo $result;
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

}