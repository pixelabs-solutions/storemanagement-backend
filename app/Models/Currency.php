<?php

namespace Pixelabs\StoreManagement\Models;

class Currency
{
    public static function store_currencies($currencies)
    {
        global $connection;

        try {
            foreach ($currencies as $currency) {
                $stmt = $connection->prepare("
                    INSERT INTO categories (id, name, symbol)
                    VALUES (?, ?, ?)
                    ON DUPLICATE KEY UPDATE
                        name = VALUES(name),
                        symbol = VALUES(parent)
                ");

                $id = $currency['id'];
                $name = $currency['name'];
                $symbol = $currency['symbol'];

                $stmt->bind_param(
                    'iss',
                    $id,
                    $name,
                    $symbol
                );

                $stmt->execute();
                $stmt->close();
            }
        }
        catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }
    }

    public static function get_all_currencies()
    {
        global $connection;
        $currencies = [];

        try {
            $query = "SELECT * FROM categories";
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