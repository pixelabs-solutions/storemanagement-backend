<?php

namespace Pixelabs\StoreManagement\Models;
use Pixelabs\StoreManagement\Models\Authentication;


class Configuration
{
    public static function add($consumer_key, $consumer_secret, $store_url)
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
        $sql = "INSERT INTO user_configurations (user_id, consumer_key, consumer_secret, store_url) VALUES (?, ?, ?, ?)";

        if ($stmt = $connection->prepare($sql)) 
        {
            $stmt->bind_param("ssss", $user_id, $consumer_key, $consumer_secret, $store_url);

            if ($stmt->execute()) 
            {
                $stmt->close();
                return json_encode([
                    "message" => "Configuration added successfully.",
                    "status_code" => 201 
                ]);
            } 
            else 
            {
                $stmt->close();
                error_log("Error executing insert: " . $stmt->error);
                return json_encode([
                    "message" => "Failed to add configuration.",
                    "status_code" => 500 // Internal Server Error
                ]);
            }
        } 
        else 
        {
            error_log("Error preparing statement: " . $connection->error);
            return json_encode([
                "message" => "Error preparing SQL statement.",
                "status_code" => 500 // Internal Server Error
            ]);
        }
    }
}