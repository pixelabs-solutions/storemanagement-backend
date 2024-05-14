<?php

namespace Pixelabs\StoreManagement\Models;
use Pixelabs\StoreManagement\Models\Configuration;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class Transaction
{
    public static function update_bulk_status($payload)
    {
        $response = json_decode(Configuration::getConfiguration(), true);
        if($response['status_code'] != 200)
        {
            echo $response["message"];
            return;
        }
        $configurations = $response['data'];
        $consumer_key = $configurations["consumer_key"];
        $consumer_secret = $configurations["consumer_secret"];
        $store_url = $configurations["store_url"];

        $client = new Client();

        try
        {
            $response = $client->request('POST', $store_url . '/wp-json/wc/v3/orders/batch', [
                'auth' => [$consumer_key, $consumer_secret],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $payload
            ]);


            if ($response->getStatusCode() == 200) 
            {
                $data = json_decode($response->getBody(), true);
                return json_encode(['message' => 'Bulk Statuses have been updated.', 'status_code' => $response->getStatusCode()]);
            } 
            else 
            {
                return json_encode(['message' => 'Could not update statuses.', 'status_code' => $response->getStatusCode()]);
            }
        }
        catch(RequestException $exception)
        {
            error_log($exception->getMessage());
            echo $exception->getMessage();
        }
    }
}