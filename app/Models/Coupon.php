<?php

namespace Pixelabs\StoreManagement\Models;

class Coupon
{
    

    public static function store_coupons($coupons, $user_id)
    {
        global $connection;
        try {
            foreach ($coupons as $coupon) {
                $stmt = $connection->prepare("
                    INSERT INTO coupons (id, user_id, code, date_expires, discount_type, usage_limit, usage_count, amount)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                ");
                $id = $coupon['id'];
                $code = $coupon['code'];
                $discount_type = $coupon['discount_type'];
                $usage_limit = $coupon['usage_limit'];
                $usage_count = $coupon['usage_count'];
                $date_expires = $coupon['date_expires'];
                $amount = $coupon['amount'];

                $stmt->bind_param(
                    'iisssiii',
                    $id,
                    $user_id,
                    $code,
                    $date_expires,
                    $discount_type,
                    $usage_limit,
                    $usage_count,
                    $amount,
                );

                $stmt->execute();
                $stmt->close();
            }
            
        } catch (\mysqli_sql_exception $e) {
            echo "store_coupons() Database error: " . $e->getMessage() . "\n";
        }
    }


    public static function get_all_coupons($user_id)
    {
        global $connection;
        $coupons = [];

        try {
            $query = "SELECT * FROM coupons WHERE user_id = $user_id";
            $result = $connection->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $coupons[] = $row;
                }
                $result->free();
            } else {
                echo "Error executing query: " . $connection->error . "\n";
            }
        } catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }

        return $coupons;
    }



}


