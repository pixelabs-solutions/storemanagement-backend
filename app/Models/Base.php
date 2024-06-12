<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Base
{
    
    public function __construct(){

    }

    public static function get_all($table_name)
    {
        global $connection;
        $table_name = $connection->real_escape_string($table_name); 
        $sql = "SELECT * FROM `$table_name`";
        $result = $connection->query($sql);
        $data = [];
        if ($result) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
        return $data;
    }
    public static function get_by_id($table_name, $id){
        global $connection;
        $sql = "SELECT * FROM `$table_name` WHERE id = ?";
        $stmt = $connection->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Failed to prepare the SQL statement: " . $connection->error);
        }
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $stmt->close();
            return $data;
        } else {
            $stmt->close();
            throw new Exception("Failed to execute the SQL statement: " . $connection->error);
        }                                                                   
    }
    
    public static function delete_by_id($table_name, $id){
        global $connection;

        $table_name = $connection->real_escape_string($table_name);

        $sql = "DELETE FROM `$table_name` WHERE id = ?";
        $stmt = $connection->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Failed to prepare the SQL statement: " . $connection->error);
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            $stmt->close();
            throw new Exception("Execution failed: " . $stmt->error);
        }

        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows > 0;
    }

    public static function truncate_table($tables, $user_id)
    {
        global $connection;
        

        try{
            foreach ($tables as $table) {
                // Escape table name to prevent SQL injection
                $escapedTable = $connection->real_escape_string($table);
                $query = "DELETE FROM `" . $escapedTable . "` WHERE user_id = $user_id";
                $connection->query($query);
            }
                      
        }
        catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }
    }

    

    public static function wc_get($configuration, $endpoint, $fields = [])
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();

        // [
        //     'timeout' => 300, 
        //     'connect_timeout' => 30, 
        // ]
        $all_records = [];
        $page = 1;

        try 
        {
            while (true) 
            {
                $response = $client->request('GET', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                    'auth' => [$consumer_key, $consumer_secret],
                    'query' => array_merge(['per_page' => 100, 'page' => $page], $fields)
                ]);

                $result = json_decode($response->getBody(), true);
                
                if (empty($result)) 
                {
                    break;
                }

                $all_records = array_merge($all_records, $result);
                $total_results = count($result); 
                if ($total_results < 100){
                    break;
                }
                $page++;
            }

            return $all_records;
        } 
        catch (RequestException $e) 
        {
            echo "Exception: ".$e->getMessage();
            return null;
        }
    }

    public static function wc_add($configuration, $endpoint, $payload)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];

        $client = new Client();
        try
        {
            $response = $client->request('POST', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                'auth' => [$consumer_key, $consumer_secret],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $payload
            ]);

            if ($response->getStatusCode() == 201) 
            {
                http_response_code($response->getStatusCode());
                $data = json_decode($response->getBody(), true);
                return json_encode(['message' => 'Data added', 'status_code' => $response->getStatusCode(), 'data_id' => $data['id']]);
            } 
            else 
            {
                http_response_code($response->getStatusCode());
                return json_encode(['message' => 'Could not add data', 'status_code' => $response->getStatusCode()]);
            }
        }
        catch(RequestException $exception)
        {
            error_log($exception->getMessage());
            echo $exception->getMessage();
        }
    }

    public static function wc_get_by_id($configuration, $endpoint, $fields = [])
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();

        try 
        {
            $response = $client->request('GET', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                'auth' => [$consumer_key, $consumer_secret],
                'query' => $fields
            ]);
        
            if($response->getStatusCode() == 200)
            {
                http_response_code($response->getStatusCode());
                $data = json_decode($response->getBody(), true);
                return json_encode(['message' => 'Fetched successfully', 'status_code' => $response->getStatusCode(), 'data' => $data], JSON_UNESCAPED_UNICODE);
            }
            else
            {
                http_response_code($response->getStatusCode());
                return json_encode(['message' => 'Not found', 'status_code' => $response->getStatusCode()]);
            }
        } 
        catch (RequestException $e) 
        {
            echo $e->getMessage();
        }
    }

    public static function wc_delete_by_id($configuration, $endpoint)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];

        $client = new Client();
        try 
        {
            $response = $client->request('DELETE', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                'auth' => [$consumer_key, $consumer_secret],
                'query' => ['force' => true]
            ]);

            if($response->getStatusCode() == 200)
            {
                http_response_code($response->getStatusCode());
                $data = json_decode($response->getBody(), true);
                return json_encode(['message' => 'Deleted', 'status_code' => $response->getStatusCode(), 'data_id' => $data['id']]);
            }
            else
            {
                http_response_code($response->getStatusCode());
                return json_encode(['message' => 'Could not delete record', 'status_code' => $response->getStatusCode()]);
            }
        
        } 
        catch (RequestException $e) 
        {
            echo $e->getMessage();
            return null;
        }
    }

    public static function wc_update($configurations, $endpoint, $payload, $request_type = null)
    {
        $consumer_key = $configurations["consumer_key"];
        $consumer_secret = $configurations["consumer_secret"];
        $store_url = $configurations["store_url"];

        $client = new Client();
        try
        {
            $response = $client->request('PUT', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                'auth' => [$consumer_key, $consumer_secret],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $payload
            ]);

            // var_dump($response->getBody());
            if ($response->getStatusCode() == 200) 
            {
                http_response_code($response->getStatusCode());
                return json_encode(['message' => 'Data updated', 'status_code' => $response->getStatusCode()]);
            } 
            else 
            {
                http_response_code($response->getStatusCode());
                return json_encode(['message' => 'Could not update record', 'status_code' => $response->getStatusCode()]);
            }
        }
        catch(RequestException $exception)
        {
            error_log($exception->getMessage());
            echo $exception->getMessage();
        }

    }

    public static function get_number_of_products($user_id, $params = []) {
        global $connection;

        // SQL query to count the number of rows in the products table
        $query = "SELECT COUNT(*) AS product_count FROM products WHERE user_id = $user_id";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();
        // echo var_dump($row);
        // $client = new Client();
        // $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products', $params);
 
        // $products = json_decode($response->getBody(), true);
        // return ($row['product_count'] !== null) ? $row['product_count'] : 0;
        return $row['product_count'];
    }

    

    public static function get_number_of_orders($user_id, $params = []) {
        global $connection;

        // SQL query to count the number of rows in the products table
        $query = "SELECT COUNT(*) AS orders_count FROM transactions WHERE user_id = $user_id";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        // $client = new Client();
        // $response = $client->request('GET', $store_url . '/wp-json/wc/v3/orders', $params);
        // $orders = json_decode($response->getBody(), true);
        return $row['orders_count'];
    }

    public static function get_total_revenue($user_id, $params = []) {
        // $client = new Client();
        // $response = $client->request('GET', $store_url.'/wp-json/wc/v3/orders', $params);
        // $orders = json_decode($response->getBody(), true);
        global $connection;

        // SQL query to count the number of rows in the products table
        $query = "SELECT total FROM transactions WHERE user_id = $user_id";
        $result = $connection->query($query);
        $totalRevenue = 0;

        while ($row = $result->fetch_assoc()) {
            // echo json_encode($row);
            $totalRevenue += $row['total'];
        }
  
        return $totalRevenue;
    }
    public static function get_new_customers_count($user_id, $params = []) {
        // $client = new Client();
        // $response = $client->request('GET', $store_url. '/wp-json/wc/v3/orders', $params);
        // $orders = json_decode($response->getBody(), true);
        global $connection;

        // SQL query to count the number of rows in the products table
        $query = "SELECT customer_id, id  FROM transactions WHERE user_id = $user_id";
        $result = $connection->query($query);

        $customerOrdersCount = [];
        // if($orders === null) return 0;
        while ($row = $result->fetch_assoc()) {
            $customerId = $row['customer_id'] ?? 'guest_' . ($row['id'] ?? uniqid());
            if (!isset($customerOrdersCount[$customerId])) {
                $customerOrdersCount[$customerId] = 0;
            }
            $customerOrdersCount[$customerId]++;
        }

        $newCustomers = array_filter($customerOrdersCount, function($count) {
            return $count === 1;
        });

        return count($newCustomers);
    }

    public static function get_returning_customers_count($user_id, $params = []) {
        // $client = new Client();
        // $response = $client->request('GET', $store_url . '/wp-json/wc/v3/orders', $params);
        // $orders = json_decode($response->getBody(), true);

        global $connection;

        // SQL query to count the number of rows in the products table
        $query = "SELECT customer_id, id  FROM transactions WHERE user_id = $user_id";
        $result = $connection->query($query);

        $customerOrdersCount = [];

        while ($row = $result->fetch_assoc()) {
            $customerId = $row['customer_id'] ?? 'guest_' . ($row['id'] ?? uniqid());
            if (!isset($customerOrdersCount[$customerId])) {
                $customerOrdersCount[$customerId] = 0;
            }
            $customerOrdersCount[$customerId]++;
        }

        $returningCustomers = array_filter($customerOrdersCount, function($count) {
            return $count > 1;
        });

        return count($returningCustomers);
    }

    public static function calculate_raise_in_orders($store_url, $params)
    {
        $client = new Client();
        $response = $client->request('GET', $store_url . '/wp-json/wc/v3/orders', $params);
        if ($response->getStatusCode() == 200) {
            $orders = json_decode($response->getBody(), true);
            $totalItems = 0;
            $totalPrice = 0;
            $totalOrders = count($orders);
            if($totalOrders === 0) return ['average_items' => 0, 'average_price' => 0];
            foreach ($orders as $order) {
                foreach ($order['line_items'] as $line_item) {
                    $totalItems += $line_item['quantity'];
                }
                $totalPrice += $order['total'];
            }
            $averageItemsPerOrder = $totalItems / $totalOrders;
            $averageOrderPrice = $totalPrice / $totalOrders;
            return ['average_items' => $averageItemsPerOrder, 'average_price' => $averageOrderPrice];
        }
        return ['average_items' => 0, 'average_price' => 0];
    }




    public static function wc_batch($configuration, $endpoint, $payload)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];

        $client = new Client();
        try
        {
            $response = $client->request('POST', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                'auth' => [$consumer_key, $consumer_secret],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $payload
            ]);

            if ($response->getStatusCode() == 200) 
            {
                http_response_code($response->getStatusCode());
                return json_encode(['message' => 'Data imported', 'status_code' => $response->getStatusCode()]);
            } 
        }
        catch(RequestException $exception)
        {
            error_log($exception->getMessage());
            echo $exception->getMessage();
        }
    }
}