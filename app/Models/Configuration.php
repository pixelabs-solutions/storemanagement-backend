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

    public static function getConfiguration($fromApp = null)
    {
        global $connection;
        $user_id = Authentication::getUserId();
        if($user_id == null)
        {
            // return json_encode([
            //     "message" => "User not authenticated.",
            //     "status_code" => 401 
            // ]);
            header('Location: /authentication/login');

        }
        // SQL to fetch configuration based on user ID
        $query = "SELECT * FROM user_configurations WHERE user_id = ? LIMIT 1";

        if ($stmt = $connection->prepare($query)) {
            // Bind the user ID to the prepared statement
            $stmt->bind_param("i", $user_id);

            // Execute the statement
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $configuration = $result->fetch_assoc();
                $stmt->close();

                // Check if configuration was found
                if ($configuration) {
                    return json_encode([
                        "message" => "Configuration retrieved successfully.",
                        "status_code" => 200,
                        "data" => $configuration
                    ]);
                } else {
                    return json_encode([
                        "message" => "No configuration found for the user.",
                        "status_code" => 404
                    ]);
                }
            } else {
                $stmt->close();
                return json_encode([
                    "message" => "Failed to execute query.",
                    "status_code" => 500
                ]);
            }
        } else {
            return json_encode([
                "message" => "Error preparing SQL statement.",
                "status_code" => 500
            ]);
        }
    }
}