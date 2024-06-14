<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class Transaction
{
    public static function update_bulk_status($configuration, $payload)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];

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
                Synchronize::sync_transactions();
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


    public static function store_transactions($transactions, $user_id)
    {
        global $connection;
        try {
            foreach ($transactions as $transaction) {
                $stmt = $connection->prepare("
                    INSERT INTO transactions (id, user_id, status, date_created, customer_id, shipping_total, total, city, billing, meta_data, line_items)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ");
                $id = $transaction['id'];
                $status = $transaction['status'];
                $date_created = $transaction['date_created'];
                $customer_id = $transaction['customer_id'];

                $shipping_total = $transaction['shipping_total'];
                $total = $transaction['total'];
                $city = $transaction['billing']['city'];
                $billing = json_encode($transaction['billing']);
                $meta_data = json_encode($transaction['meta_data']);
                $line_items = json_encode($transaction['line_items']);

                $stmt->bind_param(
                    'iissisdssss',
                    $id,
                    $user_id,
                    $status,
                    $date_created,
                    $customer_id,
                    $shipping_total,
                    $total,
                    $city,
                    $billing,
                    $meta_data,
                    $line_items
                );

                $stmt->execute();
                $stmt->close();
            }
        } catch (\mysqli_sql_exception $e) {
            echo "store_orders() Database error: " . $e->getMessage() . "\n";
        }
    }

    public static function get_all_transactions($user_id)
    {
        global $connection;
        $orders = [];

        try {
            $query = "SELECT * FROM transactions WHERE user_id = ? ORDER BY date_created DESC";
            $stmt = $connection->prepare($query);
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                while ($row = $result->fetch_assoc()) {

                    $row['billing'] = json_decode($row['billing'], true);
                    $row['meta_data'] = json_decode($row['meta_data'], true);
                    $row['line_items'] = json_decode($row['line_items'], true);
                    $orders[] = $row;
                }
                $result->free();
            } else {
                echo "Error executing query: " . $stmt->error . "\n";
            }

            $stmt->close();
        } catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }

        return $orders;
    }

    public static function get_transaction_by_id($transaction_id)
    {
        global $connection;
        $transaction = null; 

        try {
            // Prepare the SQL statement
            $stmt = $connection->prepare("SELECT * FROM transactions WHERE id = ?");
            if ($stmt === false) {
                throw new \mysqli_sql_exception("Unable to prepare statement: " . $connection->error);
            }
            $stmt->bind_param("i", $transaction_id);

            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $row['billing'] = json_decode($row['billing'], true);
                    $row['meta_data'] = json_decode($row['meta_data'], true);
                    $row['line_items'] = json_decode($row['line_items'], true);
                    $transaction = $row;
                } else {
                    echo "No order found with the given ID.\n";
                }
                $result->free();
            } else {
                echo "Error executing query: " . $stmt->error . "\n";
            }
            $stmt->close();
        } catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }
        return json_encode(['message' => 'Fetched successfully', 'status_code' => 200, 'data' => $transaction], JSON_UNESCAPED_UNICODE);
    }
}