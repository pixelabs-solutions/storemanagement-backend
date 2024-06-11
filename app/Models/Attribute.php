<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Attribute
{


    public static function store_attributes($attribute)
    {
        global $connection;

        try {
            $stmt = $connection->prepare("
                INSERT INTO attributes (id, name, type)
                VALUES (?, ?, ?)
                ON DUPLICATE KEY UPDATE
                    id = VALUES(id),
                    name = VALUES(name),
                    type = VALUES(type)
            ");

            $id = $attribute['id'];
            $name = $attribute['name'];
            $type = $attribute['type'];

            $stmt->bind_param(
                'iss',
                $id,
                $name,
                $type
            );

            $stmt->execute();
            $stmt->close();

        }
        catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }
    }

    public static function get_all_attributes()
    {
        global $connection;

        try {
            $query = "SELECT * FROM attributes";
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
            $response = $client->request('POST', $endpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
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

    public static function add_term($configuration, $payload, $attributes_id, $term_name){
        $store_url = $configuration["store_url"];

        $client = new Client();
        try
        {
            $endpoint = $store_url."/wp-admin/admin-ajax.php?action=woomanagement_add_term&name=".$term_name."&description=&attribute_id=".$attributes_id;
            // echo $endpoint;exit;
            $response = $client->request('POST', $endpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
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
}