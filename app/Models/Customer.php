<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Pixelabs\StoreManagement\Models\Configuration;

class Customer
{
    public static function get_customers()
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
        $customerData = [];

        try 
        {
            $response = $client->request('GET', $store_url . '/wp-json/wc/v3/customers', [
                'auth' => [$consumer_key, $consumer_secret]
            ]);
        
            $customers = json_decode($response->getBody(), true);
            foreach ($customers as $customer) {
                $customerId = $customer['id'];
                $totalAmount = 0;
                $orderCount = 0;
                $lastOrderDate = '';
                $averageOrderCost = 0;
    
                try {
                    $ordersResponse = $client->request('GET', $store_url. '/wp-json/wc/v3/orders', [
                        'auth' => [$consumer_key, $consumer_secret],
                        'query' => ['customer' => $customerId]
                    ]);
                    $orders = json_decode($ordersResponse->getBody(), true);

                    $orderCount = count($orders);
                    
                    foreach ($orders as $order) {
                        $totalAmount += $order['total'];
                        $orderDate = strtotime($order['date_created']);
                        if (empty($lastOrderDate) || $orderDate > strtotime($lastOrderDate)) {
                            $lastOrderDate = $order['date_created'];
                        }
                    }
    
                    if ($orderCount > 0) {
                        $averageOrderCost = $totalAmount / $orderCount;
                    }
    
                } catch (RequestException $e) {
                    echo "Error fetching orders for customer ID $customerId: " . $e->getMessage() . "\n";
                }
    
                $customerData[] = [
                    'id' => $customerId,
                    'customer_name' => $customer['first_name'] . " " . $customer['last_name'],
                    'email' => $customer['email'],
                    'date_of_last_order' => $lastOrderDate,
                    'number_of_orders' => $orderCount,
                    'total_amount' => $totalAmount,
                    'average_order_cost' => $averageOrderCost
                ];
            }
        } 
        catch (RequestException $e) 
        {
            echo "Error fetching customers: " . $e->getMessage() . "\n";
            return [];
        }
        return json_encode(['message' => 'fetch', 'status_code' => 200, 'data' => $customerData]);
    }
}