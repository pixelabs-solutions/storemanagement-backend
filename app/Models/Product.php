<?php

// app\Models\Product.php


namespace Pixelabs\StoreManagement\Models;
// require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class Product
{

    public static function get_products()
    {
        $consumer_key = 'ck_0405267ad69fef3a83b4c92209b9297acf47913a'; // Replace with your Consumer Key
        $consumer_secret = 'cs_6d1897f6854ac6f6ba3958ecdc254bbc28d13278'; // Replace with your Consumer Secret
        $store_url = 'https://vast.pk'; 

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
