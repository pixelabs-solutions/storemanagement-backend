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
        
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            echo $e->getMessage();
        }
    }

    public static function get_product_by_id($id)
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
        try 
        {
            $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products/'.$id, [
                'auth' => [$consumer_key, $consumer_secret]
            ]);
        
            $product = json_decode($response->getBody(), true);
            if($product['status'] !== 'publish')
            {
                return null;
            }
            return $product;
        } 
        catch (RequestException $e) 
        {
            echo $e->getMessage();
        }
    }


    public static function delete($id)
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
        try 
        {
            $response = $client->request('DELETE', $store_url . '/wp-json/wc/v3/products/'.$id, [
                'auth' => [$consumer_key, $consumer_secret]
            ]);

            if($response->getStatusCode() == 200)
            {
                return json_decode($response->getBody(), true);
            }
            return null;
        
        } 
        catch (RequestException $e) 
        {
            echo $e->getMessage();
            return null;
        }
    }
    


    public static function add($data)
    {
        $response = json_decode(Configuration::getConfiguration(), true);
        if($response['status_code'] != 200)
        {
            echo $response["message"];
        }
        $configurations = $response['data'];
        $consumer_key = $configurations["consumer_key"];
        $consumer_secret = $configurations["consumer_secret"];
        $store_url = $configurations["store_url"];

        $payload = json_encode([
            'name' => $data['name'], 
            'type' => $data['type'],
            'description' => $data['description'], 
            'manage_stock' => true,
            'stock_quantity' => $data['stock_quantity'], 
            'categories' => array_map(function($category_id) {
                return ['id' => $category_id]; 
            }, $data['categories']),
            'images' => array_map(function($image_url) {
                return ['src' => $image_url]; 
            }, $data['images']),
            'regular_price' => $data['regular_price'],
            'sale_price' => $data['sale_price'],
            'status' => 'publish'
        ]);

        $client = new Client();
        try
        {
            $response = $client->request('POST', $store_url . '/wp-json/wc/v3/products', [
                'auth' => [$consumer_key, $consumer_secret],
                'body' => $payload
            ]);

            var_dump($response);

            // var_dump($response->getBody());
            if ($response->getStatusCode() == 201) 
            {
                return ['success' => 'true', 'status_code' => $response->getStatusCode()];
            } 
            else 
            {
                return ['success' => 'false', 'status_code' => $response->getStatusCode()];
            }
        }
        catch(RequestException $exception)
        {
            error_log($exception->getMessage());
            return null;
        }
    }
}
