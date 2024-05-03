<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Configuration;

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

}