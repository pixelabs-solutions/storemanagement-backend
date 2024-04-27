<?php

namespace Pixelabs\StoreManagement\Models;


class Authentication
{
    public static function register($email, $password)
    {
        if (!empty($email) && !empty($password)) {
            $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        
            $stmt->bind_param("sss", $email, $email, hashPassword($password)); // sss indicates three string parameters
        
            // Execute statement
            if ($stmt->execute()) {
                http_response_code(201);
                return json_encode(array("message" => "User registered successfully."));
            } else {
                http_response_code(503); // Service unavailable
                return json_encode(array("message" => "Unable to register user."));
            }
            $stmt->close();
        } else {
            // Not all necessary data was submitted
            http_response_code(400); // Bad request
            return json_encode(array("message" => "Unable to register user. Data is incomplete."));
        }
    }

    public static function login($email, $password)
    {
        if (!empty($email) && !empty($password)) {
            // Prepare an SQL statement to avoid SQL injection
            $stmt = $mysqli->prepare("SELECT id, password FROM users WHERE email = ?");
        
            // Bind parameter
            $stmt->bind_param("s", $email);
        
            // Execute statement
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows == 1) {
                // Check if password matches
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    http_response_code(200); // OK
                    return json_encode(array("message" => "Logged in successfully.", "user_id" => $user['id']));
                } else {
                    http_response_code(401); // Unauthorized
                    return json_encode(array("message" => "Login failed. Password does not match."));
                }
            } else {
                http_response_code(404); // Not found
                return json_encode(array("message" => "Login failed. User not found."));
            }
            $stmt->close();
        } else {
            // Not all necessary data was submitted
            http_response_code(400); // Bad request
            return json_encode(array("message" => "Login failed. Data is incomplete."));
        }
    }
}