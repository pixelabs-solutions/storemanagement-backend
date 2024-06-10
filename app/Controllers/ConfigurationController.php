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
        
        $user_id = $data[0]['user_id'];
        $store_url = $_GET['store_url'];
        $consumer_key = $_GET['consumer_key'];
        $consumer_secret = $_GET['consumer_secret'];
        
        if(!$user_id || $user_id === null){
            echo json_encode(array("error_uid"=>"invalid x-code"));            
        } elseif($store_url === null || $store_url === "" || $consumer_key === null || $consumer_key === "" || $consumer_secret === null || $consumer_secret === ""){
             echo json_encode(array("data_uid"=>$user_id));            
        }
        else{
            echo $result = Configuration::add($consumer_key, $consumer_secret, $store_url, $user_id);
        }
    }
}