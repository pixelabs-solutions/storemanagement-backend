<?php

namespace Pixelabs\StoreManagement\Models;

class Currency
{
    public static function store_currencies($currency, $user_id)
    {
        global $connection;

        try {
            $stmt = $connection->prepare("
                INSERT INTO currencies (user_id, code, name, symbol)
                VALUES (?, ?, ?, ?)
            ");
            $code = $currency['code'];
            $name = $currency['name'];
            $symbol = $currency['symbol'];

            $stmt->bind_param(
                'isss',
                $user_id,
                $code,
                $name,
                $symbol
            );

            $stmt->execute();
            $stmt->close();
            
        }
        catch (\mysqli_sql_exception $e) {
            echo "store_currencies() Database error: " . $e->getMessage() . "\n";
        }
    }

    public static function get_current_currency($user_id)
    {
        global $connection;
        $currencies = [];

        try {
            $query = "SELECT * FROM currencies WHERE user_id = $user_id";
            $result = $connection->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $currencies[] = $row;
                }
                $result->free();
            } else {
                echo "Error executing query: " . $connection->error . "\n";
            }
        } catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }

        return $currencies;
    }
}