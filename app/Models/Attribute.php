<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Attribute
{


    public static function store_attributes($attributes, $user_id)
    {
        global $connection;

        try {
            foreach($attributes as $attribute){
                $stmt = $connection->prepare("
                    INSERT INTO attributes (id, user_id, name, type)
                    VALUES (?, ?, ?, ?)
                ");

                $id = $attribute['id'];
                $name = $attribute['name'];
                $type = $attribute['type'];

                $stmt->bind_param(
                    'iiss',
                    $id,
                    $user_id, 
                    $name,
                    $type
                );

                $stmt->execute();
                $stmt->close();
            }
            

        }
        catch (\mysqli_sql_exception $e) {
            echo "store_attributes() Database error: " . $e->getMessage() . "\n";
        }
    }

    public static function get_all_attributes($user_id)
    {
        global $connection;
        $attributes = [];

        try {
            $query = "SELECT * FROM attributes WHERE user_id = $user_id";
            $result = $connection->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $attributes[] = $row;
                }
                $result->free();
            } else {
                echo "Error executing query: " . $connection->error . "\n";
            }
        } catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }

        return $attributes;
    }



    public static function add($configuration, $payload)
    {
        $store_url = $configuration["store_url"];

        $name = $payload['name'];
        $type = $payload['type'];

        $client = new Client();
        try
        {
            $endpoint = $store_url."/wp-admin/admin-ajax.php?action=woomanagement_add_attribute&name=".$name."&type=".$type;
            // echo $endpoint;exit;
            $response = $client->request('POST', $endpoint, [
                
                'body' => json_encode($payload)
            ]);


            if ($response->getStatusCode() == 200) 
            {
                http_response_code($response->getStatusCode());
                $data = json_decode($response->getBody(), true);
                return json_encode(['message' => 'Data added', 'status_code' => $response->getStatusCode()]);
            }
        }
        catch(RequestException $exception)
        {
            error_log($exception->getMessage());
            echo $exception->getMessage();
        }
    }

    public static function add_term($configuration, $payload){
        $store_url = $configuration["store_url"];

        $client = new Client();
        try
        {
            $endpoint = $store_url."/wp-admin/admin-ajax.php?action=woomanagement_add_term&name=".$payload['name']."&description=".$payload['description']."&attribute_id=".$payload['attribute_id'];
            // echo json_encode($payload);exit;
            $options = [
                'multipart' => [
                  [
                    'name' => 'data',
                    'contents' => $payload['data']
                  ]
              ]];
            $response = $client->request('POST', $endpoint, $options);


            if ($response->getStatusCode() == 200) 
            {
                http_response_code($response->getStatusCode());
                $data = json_decode($response->getBody(), true);
                return json_encode(['message' => 'Data added', 'status_code' => $response->getStatusCode()]);
            }
        }
        catch(RequestException $exception)
        {
            error_log($exception->getMessage());
            echo $exception->getMessage();
        }
    }
}