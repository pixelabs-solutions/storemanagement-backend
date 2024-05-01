<?php

// app\Models\Product.php


namespace Pixelabs\StoreManagement\Models;
// require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Pixelabs\StoreManagement\Models\Configuration;
class Product
{

    public static function get_products()
    {
        $response = json_decode(Configuration::getConfiguration(), true);
        if($response['status_code'] != 200)
        {
            echo $response["message"];
        }
        $data = $response['data'];
        $consumer_key = $data["consumer_key"];
        $consumer_secret = $data["consumer_secret"];
        $store_url = $data["store_url"];

        $client = new Client();
        try {
            $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products', [
                'auth' => [$consumer_key, $consumer_secret]
            ]);
        
            $products = json_decode($response->getBody(), true);
            return $products;
        } catch (RequestException $e) {
            echo $e->getMessage();
        }
    }

    
}
