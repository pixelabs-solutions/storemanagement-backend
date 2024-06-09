<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Authentication;

class ConfigurationController
{
    public function add()
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);

        $consumer_key = isset($data['consumer_key']) ? $data['consumer_key'] : null;
        $consumer_secret = isset($data['consumer_secret']) ? $data['consumer_secret'] : null;
        $store_url = isset($data['store_url']) ? $data['store_url'] : null;

        $areConfigurationsAdded = Configuration::add($consumer_key, $consumer_secret, $store_url);

        echo $areConfigurationsAdded;
    }
    
    public function verify_xcode_and_add_configurations()
    {
        $xcode = "";
        if(isset($_GET['x_code'])){
            $xcode = $_GET['x_code'];
        }
        $data = Authentication::get_meta_by_xcode($xcode);
        echo json_encode($data);
        exit;
        $user_id = $data['user_id'];
        $store_url = $_GET['store_url'];
        $consumer_key = $_GET['consumer_key'];
        $consumer_secret = $_GET['consumer_secret'];

        $result = Configuration::add($consumer_key, $consumer_secret, $store_url, $user_id);
        echo json_encode($result);
        
    }

}