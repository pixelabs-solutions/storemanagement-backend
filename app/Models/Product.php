<?php

// app\Models\Product.php


namespace Pixelabs\StoreManagement\Models;
// require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class Product
{

    // public static function get_products($configuration)
    // {
    //     $consumer_key = $configuration["consumer_key"];
    //     $consumer_secret = $configuration["consumer_secret"];
    //     $store_url = $configuration["store_url"];

    //     $client = new Client();
    //     try {
    //         $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products', [
    //             'auth' => [$consumer_key, $consumer_secret]
    //         ]);
        
    //         return json_decode($response->getBody(), true);
    //     } catch (RequestException $e) {
    //         echo $e->getMessage();
    //     }
    // }

    public static function get_products($configuration, $endpoint, $fields = [])
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();
        $all_products = [];
        $page = 1;

        try 
        {
            while (true) 
            {
                $response = $client->request('GET', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                    'auth' => [$consumer_key, $consumer_secret],
                    'query' => array_merge(['per_page' => 100, 'page' => $page], $fields)
                ]);
                
                $products = json_decode($response->getBody(), true);
                if (empty($products)) 
                {
                    break;
                }
                
                $all_products = array_merge($all_products, $products);
                $page++;
            }
            
            return $all_products;
        } 
        catch (RequestException $e) 
        {
            echo "Exception: ".$e->getMessage();
            return null;
        }
    }

    public static function get_product_by_id($configuration, $id)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();
        try 
        {
            $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products/'.$id, [
                'auth' => [$consumer_key, $consumer_secret]
            ]);
        
            $product = json_decode($response->getBody(), true);
            // if($product['status'] !== 'publish')
            // {
            //     return null;
            // }
            return $product;
        } 
        catch (RequestException $e) 
        {
            echo $e->getMessage();
        }
    }


    public static function delete($configuration, $id)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];

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
    


    public static function add($configuration, $data)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];

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

    public static function createProductVariation($configuration, $productId, $variationData)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();

        $response = $client->request('POST', $store_url . '/wp-json/wc/v3/products/'.$productId.'/variations', [
            'auth' => [$consumer_key, $consumer_secret],
            'body' => json_encode($variationData)
        ]);

        if ($response->getStatusCode() == 201) 
        {
            return ['success' => 'true', 'status_code' => $response->getStatusCode()];
        } 
        else 
        {
            return ['success' => 'false', 'status_code' => $response->getStatusCode()];
        }
    }


    public static function get_products_count($configuration)
    {
        $client = new Client();
        $params = [
            'auth' => [$configuration["consumer_key"], $configuration["consumer_secret"]],
            'query' => [
                'per_page' => 100,
                'page' => 1
            ]
        ];

        $total_products = 0;

        while (true) {
            $response = $client->request('GET', $configuration["store_url"] . '/wp-json/wc/v3/products', $params);
            $products = json_decode($response->getBody(), true);

            $products_count = count($products);

            if ($products_count == 0) {
                break;
            }

            $total_products += $products_count;
            $params['query']['page'] += 1;
        }

        return $total_products;
    }
}
