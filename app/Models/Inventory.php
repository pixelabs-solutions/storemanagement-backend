<?php

namespace Pixelabs\StoreManagement\Models;

class Inventory
{
    public static function get()
    {
        $user_id = Authentication::getUserId();
        if($user_id == null)
        {
            return json_encode([
                "message" => "User not authenticated.",
                "status_code" => 401 
            ]);
        }

        global $connection;
        $sql = "SELECT * FROM inventory_settings WHERE user_id = ?";
        $stmt = $connection->prepare($sql);

        if ($stmt === false) {
            return json_encode([
                "message" => "Error preparing SQL statement.",
                "status_code" => 500
            ]);
        }

        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $stmt->close();
            if(!$data)
            {
                return json_encode([
                    "message" => "No settings found!",
                    "status_code" => 404
                ]);
            }
            return json_encode([
                "message" => "Settings retrieved successfully.",
                "status_code" => 200,
                "data" => $data
            ]);
        } 
        else 
        {
            $stmt->close();
                return json_encode([
                    "message" => "Failed to execute query.",
                    "status_code" => 500
                ]);
        }
    }

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

        $query = "INSERT INTO inventory_settings 
        (
            user_id, 
            is_inventory_management_enabled, 
            is_out_of_stock_alert_enabled,
            is_low_stock_alert_enabled,
            email, 
            out_of_stock_threshold, 
            low_stock_threshold
        ) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $connection->prepare($query);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $conconnection->error);
        }

        $isInventoryManagementEnabled = $data["is_inventory_management_enabled"];
        $isOutOfStockAlertEnabled = $data["is_out_of_stock_alert_enabled"];
        $isLowStockAlertEnabled = $data["is_low_stock_alert_enabled"];
        $email = $data["email"];
        $outOfStockThreshold = $data["out_of_stock_threshold"];
        $lowStockThreshold = $data["low_stock_threshold"];

        $stmt->bind_param(
            "iiiisii", 
            $user_id, 
            $isInventoryManagementEnabled, 
            $isOutOfStockAlertEnabled, 
            $isLowStockAlertEnabled, 
            $email, 
            $outOfStockThreshold, 
            $lowStockThreshold
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


    public static function update($data)
    {
        $user_id = Authentication::getUserId();
        if ($user_id == null) {
            return json_encode([
                "message" => "User not authenticated.",
                "status_code" => 401
            ]);
        }

        global $connection;
        $query = "UPDATE inventory_settings SET
        is_inventory_management_enabled = ?, 
        is_out_of_stock_alert_enabled = ?, 
        is_low_stock_alert_enabled = ?, 
        email = ?, 
        out_of_stock_threshold = ?, 
        low_stock_threshold = ?
        WHERE user_id = ?";

        $stmt = $connection->prepare($query);
        if ($stmt === false) {
            return json_encode([
                "message" => "Error preparing SQL statement.",
                "status_code" => 500
            ]);
        }

        $isInventoryManagementEnabled = $data["is_inventory_management_enabled"];
        $isOutOfStockAlertEnabled = $data["is_out_of_stock_alert_enabled"];
        $isLowStockAlertEnabled = $data["is_low_stock_alert_enabled"];
        $email = $data["email"];
        $outOfStockThreshold = $data["out_of_stock_threshold"];
        $lowStockThreshold = $data["low_stock_threshold"];

        $stmt->bind_param(
            "iiisiii",
            $isInventoryManagementEnabled,
            $isOutOfStockAlertEnabled,
            $isLowStockAlertEnabled,
            $email,
            $outOfStockThreshold,
            $lowStockThreshold,
            $user_id
        );
        if ($stmt->execute()) {
            $stmt->close();
            return json_encode([
                "message" => "Settings updated successfully",
                "status_code" => 200
            ]);
        }
        else {
            $stmt->close();
            return json_encode([
                "message" => "Error: " . $stmt->error,
                "status_code" => 500
            ]);
        }
    }
    
}
