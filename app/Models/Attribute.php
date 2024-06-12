<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Attribute
{
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

    public static function add_term($configuration, $payload){
        $store_url = $configuration["store_url"];

        $client = new Client();
        try
        {
            $endpoint = $store_url."/wp-admin/admin-ajax.php?action=woomanagement_add_term&name=".$payload['name']."&description=&attribute_id=".$payload['attribute_id'];
            // echo $endpoint;exit;
            $response = $client->request('POST', $endpoint, [
                'multipart' => [
                    'data' => $payload['data']
                ]
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