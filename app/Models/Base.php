<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Pixelabs\StoreManagement\Models\Configuration;

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
            throw new Exception("Failed to prepare the SQL statement: " . $this->connection->error);
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

    public static function wc_get($endpoint)
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
            $response = $client->request('GET', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                'auth' => [$consumer_key, $consumer_secret]
            ]);
        
            return json_decode($response->getBody(), true);
        } 
        catch (RequestException $e) 
        {
            echo $e->getMessage();
        }
    }

    public static function wc_add($endpoint, $payload)
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

            // var_dump($response);

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
            echo $exception->getMessage();
        }
    }

    public static function wc_get_by_id($endpoint)
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
            $response = $client->request('GET', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                'auth' => [$consumer_key, $consumer_secret]
            ]);
        
            $coupon = json_decode($response->getBody(), true);
            // if($product['status'] !== 'publish')
            // {
            //     return null;
            // }
            return $coupon;
        } 
        catch (RequestException $e) 
        {
            echo $e->getMessage();
        }
    }

    public static function wc_delete_by_id($endpoint)
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
            $response = $client->request('DELETE', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                'auth' => [$consumer_key, $consumer_secret],
                'query' => ['force' => true]
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

    public static function wc_update($endpoint, $payload, $request_type = null)
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

            var_dump($response);

            // var_dump($response->getBody());
            if ($response->getStatusCode() == 200) 
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
            echo $exception->getMessage();
        }

    }
}