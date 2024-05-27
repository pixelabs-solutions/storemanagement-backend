<?php

namespace Pixelabs\StoreManagement\Models;
use Pixelabs\StoreManagement\Models\Authentication;


class Configuration
{
    public static function add($consumer_key, $consumer_secret, $store_url)
    {
        global $connection;
        $user_id = Authentication::getUserIdFromToken();
        if($user_id == null || $user_id == "")
        {
            http_response_code(401);
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
                http_response_code(201);
                return json_encode([
                    "message" => "Configuration added successfully.",
                    "status_code" => 201 
                ]);
            } 
            else 
            {
                $stmt->close();
                error_log("Error executing insert: " . $stmt->error);
                http_response_code(500);
                return json_encode([
                    "message" => "Failed to add configuration.",
                    "status_code" => 500 // Internal Server Error
                ]);
            }
        } 
        else 
        {
            error_log("Error preparing statement: " . $connection->error);
            http_response_code(500);
            return json_encode([
                "message" => "Error preparing SQL statement.",
                "status_code" => 500 // Internal Server Error
            ]);
        }
    }

    public static function getConfiguration($is_rest)
    {
        global $connection;

        $is_logged_in = Authentication::isUserLoggedInApp();
        if($is_logged_in !== true && $is_rest == 'true')
        {
            http_response_code(401);
            echo json_encode([
                "message" => "User not authenticated.",
                "status_code" => 401 
            ]);
            exit;
        }
        if($is_logged_in !== true && $is_rest == 'false')
        {
            http_response_code(401);
            header('Location: /authentication/login');
            exit;
        }
        $user_id = Authentication::getUserIdFromToken();
        
        
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
                    http_response_code(200);
                    return json_encode([
                        "message" => "Configuration retrieved successfully.",
                        "status_code" => 200,
                        "data" => $configuration
                    ]);
                } else {
                    http_response_code(404);
                    return json_encode([
                        "message" => "No configuration found for the user.",
                        "status_code" => 404
                    ]);
                }
            } else {
                $stmt->close();
                http_response_code(500);
                return json_encode([
                    "message" => "Failed to execute query.",
                    "status_code" => 500
                ]);
            }
        } else {
            http_response_code(500);
            return json_encode([
                "message" => "Error preparing SQL statement.",
                "status_code" => 500
            ]);
        }
    }
}