<?php

namespace Pixelabs\StoreManagement\Models;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Authentication
{
    public static function register($name, $email, $password) {
        global $connection; 

        if (!empty($email) && !empty($password)) 
        {
            $stmt = $connection->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");

            $hashedPassword = self::hashPassword($password);

            $stmt->bind_param("ssss", $name, $email, $email, $hashedPassword);

            if ($stmt->execute()) 
            {
                return json_encode(array(
                    "message" => "User registered successfully.",
                    "status_code" => 201 // Created
                ));
            } 
            else 
            {
                return json_encode(array(
                    "message" => "Unable to register user.",
                    "status_code" => 503 // Service unavailable
                ));
            }
            $stmt->close();
        } 
        else 
        {
            return json_encode(array(
                "message" => "Unable to register user. Data is incomplete.",
                "status_code" => 400, // Bad request
            ));
        }
    }

    public static function login($email, $password) {
        global $connection; 

        if (!empty($email) && !empty($password)) {
            session_start();
            $stmt = $connection->prepare("SELECT id, password FROM users WHERE email = ?");

            $stmt->bind_param("s", $email);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['logged_in'] = true; 
                    http_response_code(200);
                    return json_encode(array(
                        "message" => "Logged in successfully.", 
                        "status_code" => 200, // OK
                        "user_id" => $user['id']));
                } else {
                    http_response_code(401);
                    return json_encode(array(
                        "message" => "Login failed. Password does not match.",
                        "status_code" => 401 // Unauthorized
                    ));
                }
            } else {
                http_response_code(404);
                return json_encode(array(
                    "message" => "Login failed. User not found.",
                    "status_code" => 404 // Not found
                ));
            }
            $stmt->close();
        } else {
            http_response_code(400);
            return json_encode(array(
                "message" => "Login failed. Data is incomplete.",
                "status_code" => 400 // Bad request
            ));
        }
    }

    public static function logout()
    {
        if (session_status() === PHP_SESSION_NONE) 
        {
            session_start();
        }
        $_SESSION = [];

        session_destroy();

        return json_encode(array(
            "message" => "Logged out successfully.",
            "status_code" => 200
        ));
    }

    public static function isUserLoggedIn() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }

    public static function getUserId()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION['user_id'] ?? null;
    }

    private static function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    //JWT Authentication
    public static function loginWithJWT($email, $password) {
        global $connection;
    
        if (!empty($email) && !empty($password)) {
            $stmt = $connection->prepare("SELECT id, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $userId = $user['id'];
                    $secretKey = "irrULnPSFnSrV1Y65cdV";
                    $issuedAt = time();
                    $expirationTime = $issuedAt + 3600;  // jwt valid for 1 hour
                    $payload = array(
                        'user_id' => $userId,
                        'iat' => $issuedAt,
                        'exp' => $expirationTime
                    );
    
                    $jwt = JWT::encode($payload, $secretKey, 'HS256');
    
                    http_response_code(200);
                    return json_encode(array(
                        "message" => "Logged in successfully.",
                        "token" => $jwt,
                        "status_code" => 200
                    ));
                } else {
                    http_response_code(401);
                    return json_encode(array(
                        "message" => "Login failed. Password does not match.",
                        "status_code" => 401
                    ));
                }
            } else {
                http_response_code(404);
                return json_encode(array(
                    "message" => "Login failed. User not found.",
                    "status_code" => 404
                ));
            }
            $stmt->close();
        } else {
            http_response_code(400);
            return json_encode(array(
                "message" => "Login failed. Data is incomplete.",
                "status_code" => 400
            ));
        }
    }


    public static function verifyJWT($token) {
        $secretKey = "irrULnPSFnSrV1Y65cdV";
        try {
            $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
            return $decoded;
        } catch (Exception $e) {
            http_response_code(401);
            echo json_encode(array(
                "message" => "Access denied. Invalid token.",
                "status_code" => 401
            ));
            exit();
        }
    }

    public static function isUserLoggedInApp() {
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        list($jwt) = sscanf($authHeader, 'Bearer %s');
    
        if ($jwt) {
            $decoded = self::verifyJWT($jwt);
            if ($decoded && isset($decoded->user_id)) {
                return true;
            }
        }
        return false;
    }

    public static function getUserIdFromToken() {
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
    
        // Fallback to apache_request_headers if $_SERVER['HTTP_AUTHORIZATION'] is empty
        if (empty($authHeader)) {
            if (function_exists('apache_request_headers')) {
                $headers = apache_request_headers();
                if (isset($headers['Authorization'])) {
                    $authHeader = $headers['Authorization'];
                }
            }
        }
    
        if (empty($authHeader)) {
            return null;
        }
    
        list($jwt) = sscanf($authHeader, 'Bearer %s');
        if (!$jwt) {
            return null;
        }
    
        $decoded = self::verifyJWT($jwt);
        if ($decoded && isset($decoded->user_id)) {
            return $decoded->user_id;
        }
    
        return null;
    }
    

}