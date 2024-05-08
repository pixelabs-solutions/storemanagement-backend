<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Pixelabs\StoreManagement\Models\Configuration;

class Statistics
{
    // public static function get_products_stats() {
    //     $response = json_decode(Configuration::getConfiguration(), true);
    //     if($response['status_code'] != 200)
    //     {
    //         echo $response["message"];
    //     }
    //     $data = $response['data'];
    //     $consumer_key = $data["consumer_key"];
    //     $consumer_secret = $data["consumer_secret"];
    //     $store_url = $data["store_url"];

    //     $client = new Client();
    //     try {
    //         $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products', [
    //             'auth' => [$consumer_key, $consumer_secret]
    //         ]);
    
    //         $products = json_decode($response->getBody(), true);
    //         $totalProducts = count($products);
    //         $normalProducts = 0;
    //         $saleProducts = 0;
    
    //         foreach ($products as $product) {
    //             if (isset($product['type']) && $product['type'] === 'simple') {
    //                 $normalProducts++;
    //             }
    //             if (isset($product['on_sale']) && $product['on_sale'] === true) {
    //                 $saleProducts++;
    //             }
    //         }

    //         $orderResponse = $client->request('GET', $store_url . '/wp-json/wc/v3/orders', [
    //             'auth' => [$consumer_key, $consumer_secret]
    //         ]);
    //         $orders = json_decode($orderResponse->getBody(), true);
    //         $numberOfOrders = count($orders);
    //         $distinctProductsOnOrder = [];

    //         foreach ($orders as $order) {
    //             if (isset($order['line_items']) && is_array($order['line_items'])) {
    //                 foreach ($order['line_items'] as $item) {
    //                     $productId = $item['product_id'];
    //                     $distinctProductsOnOrder[$productId] = true;  
    //                 }
    //             }
    //         }
    
    //         return [
    //             'totalProducts' => $totalProducts,
    //             'normalProducts' => $normalProducts,
    //             'saleProducts' => $saleProducts,
    //             'numberOfOrders' => $numberOfOrders,
    //             'totalDistinctProductsOnOrder' => count($distinctProductsOnOrder) 
    //         ];
    //     } catch (\Exception $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return [];
    //     }
    // }

    public static function get_products_stats($filter = null) {
        $response = json_decode(Configuration::getConfiguration(), true);
        if($response['status_code'] != 200) {
            echo $response["message"];
            return [];
        }
    
        $data = $response['data'];
        $consumer_key = $data["consumer_key"];
        $consumer_secret = $data["consumer_secret"];
        $store_url = $data["store_url"];
        $client = new Client();
        $dateRange = $filter ? self::getDateRange($filter) : [];

        try {
            // Fetch Products
            $productParams = [
                'auth' => [$consumer_key, $consumer_secret]
            ];
            if (!empty($dateRange)) {
                $productParams['query'] = [
                    'after' => $dateRange['after'],
                    'before' => $dateRange['before']
                ];
            }
            $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products', $productParams);
        
            $products = json_decode($response->getBody(), true);
            $totalProducts = count($products);
            $normalProducts = 0;
            $saleProducts = 0;
        
            foreach ($products as $product) {
                if (isset($product['type']) && $product['type'] === 'simple') {
                    $normalProducts++;
                }
                if (isset($product['on_sale']) && $product['on_sale'] === true) {
                    $saleProducts++;
                }
            }
    
            // Fetch Orders
            $orderParams = [
                'auth' => [$consumer_key, $consumer_secret]
            ];
            if (!empty($dateRange)) {
                $orderParams['query'] = [
                    'after' => $dateRange['after'],
                    'before' => $dateRange['before']
                ];
            }
            $orderResponse = $client->request('GET', $store_url . '/wp-json/wc/v3/orders', $orderParams);
            $orders = json_decode($orderResponse->getBody(), true);
            $numberOfOrders = count($orders);
            $distinctProductsOnOrder = [];
    
            foreach ($orders as $order) {
                if (isset($order['line_items']) && is_array($order['line_items'])) {
                    foreach ($order['line_items'] as $item) {
                        $distinctProductsOnOrder[$item['product_id']] = true;  
                    }
                }
            }
        
            return [
                'totalProducts' => $totalProducts,
                'normalProducts' => $normalProducts,
                'saleProducts' => $saleProducts,
                'numberOfOrders' => $numberOfOrders,
                'totalDistinctProductsOnOrder' => count($distinctProductsOnOrder) 
            ];
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }
    

    public static function getDateRange($filter) {
        $start = new \DateTime();
        $end = new \DateTime();
    
        switch ($filter) {
            case 'last_week':
                $start->modify('last monday -7 days');
                $end->modify('last sunday');
                break;
            case 'current_month':
                $start->modify('first day of this month');
                $end->modify('last day of this month');
                break;
            case 'last_year':
                $start->modify('first day of January last year');
                $end->modify('last day of December last year');
                break;
            default:
                $start->modify('monday this week');
                $end->modify('sunday this week');
                break;
        }
    
        return [
            'after' => $start->format('Y-m-d') . 'T00:00:00', 
            'before' => $end->format('Y-m-d') . 'T23:59:59'
        ];
    }
    
    
    
}