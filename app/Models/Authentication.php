<?php

namespace Pixelabs\StoreManagement\Models;


class Authentication
{
    public static function register($email, $password) {
        global $connection; // Reference to the global connection variable

        if (!empty($email) && !empty($password)) 
        {
            $stmt = $connection->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

            // Prepare the hashed password
            $hashedPassword = self::hashPassword($password);

            // Bind parameters
            $stmt->bind_param("sss", $email, $email, $hashedPassword); // Assume the username and email are the same

            // Execute statement
            if ($stmt->execute()) 
            {
                http_response_code(201); // Created
                return json_encode(array(
                    "message" => "User registered successfully.",
                    "status_code" => 201
                ));
            } 
            else 
            {
                http_response_code(503); // Service unavailable
                return json_encode(array(
                    "message" => "Unable to register user.",
                    "status_code" => 503
                ));
            }
            $stmt->close();
        } 
        else 
        {
            http_response_code(400); // Bad request
            return json_encode(array(
                "message" => "Unable to register user. Data is incomplete.",
                "status_code" => 400
            ));
        }
    }

    public static function login($email, $password) {
        global $connection; 

        if (!empty($email) && !empty($password)) {
            $stmt = $connection->prepare("SELECT id, password FROM users WHERE email = ?");

            $stmt->bind_param("s", $email);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    http_response_code(200); // OK
                    return json_encode(array(
                        "message" => "Logged in successfully.", 
                        "status_code" => 200,
                        "user_id" => $user['id']));
                } else {
                    http_response_code(401); // Unauthorized
                    return json_encode(array(
                        "message" => "Login failed. Password does not match.",
                        "status_code" => 401
                    ));
                }
            } else {
                http_response_code(404); // Not found
                return json_encode(array(
                    "message" => "Login failed. User not found.",
                    "status_code" => 404
                ));
            }
            $stmt->close();
        } else {
            http_response_code(400); // Bad request
            return json_encode(array(
                "message" => "Login failed. Data is incomplete.",
                "status_code" => 400
            ));
        }
    }
    private static function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}