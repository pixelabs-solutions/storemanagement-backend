<?php

namespace Pixelabs\StoreManagement\Models;


class Goal
{
    public static function add($data)
    {
        global $connection;
        $user_id = Authentication::getUserId();
        if($user_id == null)
        {
            return json_encode([
                "message" => "User not authenticated.",
                "status_code" => 401 
            ]);
        }

        $query = "INSERT INTO goals 
        (
            new_orders_target, -- int
            new_customers_target, -- int
            sales_revenue_target, -- int
            target_keywords, -- int
            google_rankings_target, -- int
            page_views_target, -- int
            avg_order_value_increase_target, -- float
            avg_order_items_increase_target, -- float
            new_products_target -- int
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($query);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $conconnection->error);
        }

        $new_orders_target = $data['new_orders_target'];
        $new_customers_target = $data['new_customers_target'];
        $sales_revenue_target = $data['sales_revenue_target'];
        $target_keywords = $data['target_keywords'];
        $google_rankings_target = $data['google_rankings_target'];
        $page_views_target = $data['page_views_target'];
        $avg_order_value_increase_target = $data['avg_order_value_increase_target'];
        $avg_order_items_increase_target = $data['avg_order_items_increase_target'];
        $new_products_target = $data['new_products_target'];

        $stmt->bind_param(
            "iiiiiiddi", 
            $new_orders_target,
            $new_customers_target,
            $sales_revenue_target,
            $target_keywords,
            $google_rankings_target,
            $page_views_target,
            $avg_order_value_increase_target,
            $avg_order_items_increase_target,
            $new_products_target
        );

        if ($stmt->execute()) 
        {
            return json_encode([
                "message" => "Settings added successfully",
                "status_code" => 201
            ]);
        } 
        else 
        {
            return json_encode([
                "message" => "Error: " . $stmt->error,
                "status_code" => 500
            ]);
        }
        $stmt->close();
    }
}