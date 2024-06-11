<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Customer
{
    public static function get_customers($configuration, $user_id)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();
        $customerData = [];

        try 
        {
            // $response = $client->request('GET', $store_url . '/wp-json/wc/v3/customers', [
            //     'auth' => [$consumer_key, $consumer_secret],
            //     'query' => [
            //         'per_page' => 100
            //     ]
            // ]);
        
            // $customers = json_decode($response->getBody(), true);
            $customers = self::get_all_customers($user_id);
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
        return ['message' => 'fetch', 'status_code' => 200, 'data' => $customerData];
    }



    public static function store_customers($customers, $user_id)
    {
        global $connection;
        try {
            foreach ($customers as $customer) {
                $stmt = $connection->prepare("
                    INSERT INTO customers (id, user_id, first_name, last_name, email)
                    VALUES (?, ?, ?, ?, ?)
                ");
                $id = $customer['id'];
                $first_name = $customer['first_name'];
                $last_name = $customer['last_name'];
                $email = $customer['email'];

                $stmt->bind_param(
                    'iisss',
                    $id,
                    $user_id,
                    $first_name,
                    $last_name,
                    $email
                );

                $stmt->execute();
                $stmt->close();
            }
            
        } catch (\mysqli_sql_exception $e) {
            echo "store_customers() Database error: " . $e->getMessage() . "\n";
        }
    }

    public static function get_all_customers($user_id)
    {
        global $connection;
        $customers = [];

        try {
            $query = "SELECT * FROM customers WHERE user_id = $user_id";
            $result = $connection->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $customers[] = $row;
                }
                $result->free();
            } else {
                echo "Error executing query: " . $connection->error . "\n";
            }
        } catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }

        return $customers;
    }



}