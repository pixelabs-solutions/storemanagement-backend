<?php

namespace Pixelabs\StoreManagement\Models;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Authentication
{
    public static function register($name, $email, $password, $phone, $business_name)
    {
        global $connection;

        if (!empty($email) && !empty($password)) {
            $stmt = $connection->prepare("INSERT INTO users (name, username, user_level, email, password) VALUES (?, ?, ?, ?, ?)");
            $user_level = USER;
            $hashedPassword = self::hashPassword($password);

            $stmt->bind_param("ssiss", $name, $email, $user_level, $email, $hashedPassword);

            if ($stmt->execute()) {
                $lastInsertedId = $connection->insert_id;
                self::update_user_meta($lastInsertedId, "phone", $phone);
                self::update_user_meta($lastInsertedId, "business_name", $business_name);
                $x_code = self::generateRandomCode();
                self::update_user_meta($lastInsertedId, "x_code", $x_code);

                return json_encode(
                    array(
                        "message" => "User registered successfully.",
                        "status_code" => 201, // Created
                        "user_id" => $lastInsertedId // Return the ID of the registered user
                    )
                );
            } else {
                return json_encode(
                    array(
                        "message" => "Unable to register user.",
                        "status_code" => 503 // Service unavailable
                    )
                );
            }
            $stmt->close();
        } else {
            return json_encode(
                array(
                    "message" => "Unable to register user. Data is incomplete.",
                    "status_code" => 400, // Bad request
                )
            );
        }
    }

    public static function generateRandomCode($length = 15)
    {
        // Ensure that the length is a multiple of 2 for bin2hex to work correctly
        $bytes = ceil($length / 2);
        $randomBytes = random_bytes($bytes);
        $randomCode = substr(bin2hex($randomBytes), 0, $length);
        return $randomCode;
    }


    public static function forgot_password($password, $user_id)
    {
        global $connection;
        $hashedPassword = self::hashPassword($password);
        // Prepare SQL statement to update the user's password

        $sql = "UPDATE users SET password = ? WHERE id = ?";

        // Prepare and bind parameters
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("si", $hashedPassword, $user_id);

        // Execute the statement
        if ($stmt->execute() === TRUE) {
            self::logout();
            header("location: ../authentication/login");
        } else {
            echo "Error updating password: " . $connection->error;
        }


    }
    public static function login($email, $password)
    {
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
                    return json_encode(
                        array(
                            "message" => "Logged in successfully.",
                            "status_code" => 200, // OK
                            "user_id" => $user['id']
                        )
                    );
                } else {
                    http_response_code(401);
                    return json_encode(
                        array(
                            "message" => "Login failed. Password does not match.",
                            "status_code" => 401 // Unauthorized
                        )
                    );
                }
            } else {
                http_response_code(404);
                return json_encode(
                    array(
                        "message" => "Login failed. User not found.",
                        "status_code" => 404 // Not found
                    )
                );
            }
            $stmt->close();
        } else {
            http_response_code(400);
            return json_encode(
                array(
                    "message" => "Login failed. Data is incomplete.",
                    "status_code" => 400 // Bad request
                )
            );
        }
    }

    public static function update_user_meta($user_id, $meta_key, $meta_value)
    {

        global $connection;

        // Check if a record with the same user_id and meta_key exists
        $check_stmt = $connection->prepare("SELECT COUNT(*) FROM user_meta WHERE user_id = ? AND meta_key = ?");
        $check_stmt->bind_param("is", $user_id, $meta_key);
        $check_stmt->execute();
        $check_stmt->bind_result($count);
        $check_stmt->fetch();
        $check_stmt->close();

        if ($count > 0) {
            // Update existing record
            $update_stmt = $connection->prepare("UPDATE user_meta SET meta_value = ? WHERE user_id = ? AND meta_key = ?");
            $update_stmt->bind_param("sis", $meta_value, $user_id, $meta_key);
            $update_stmt->execute();
            $update_stmt->close();
        } else {
            // Insert new record
            $insert_stmt = $connection->prepare("INSERT INTO user_meta (user_id, meta_key, meta_value) VALUES (?, ?, ?)");
            $insert_stmt->bind_param("iss", $user_id, $meta_key, $meta_value);
            $insert_stmt->execute();
            $insert_stmt->close();
        }


    }



    public static function get_user_meta($user_id, $meta_key)
    {

        global $connection;
        $stmt = $connection->prepare("SELECT meta_value FROM user_meta WHERE user_id = ? AND meta_key = ?");

        $stmt->bind_param("is", $user_id, $meta_key);

        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

    }

    public static function get_users_meta_by_key($meta_key)
    {

        global $connection;
        $stmt = $connection->prepare("SELECT * FROM user_meta WHERE meta_key = ?");

        $stmt->bind_param("s", $meta_key);

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public static function get_users_configuration_status()
    {

        global $connection;
        $stmt = $connection->prepare("SELECT user_id FROM user_configurations");

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public static function get_user_by_id($user_id)
    {
        global $connection;
        $query = "SELECT name from users WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $user_id); // Bind the parameter to the query

        $stmt->execute();
        $stmt->bind_result($name); // Bind the result to a variable

        if ($stmt->fetch()) {
            return $name; // Return the fetched name
        } else {
            return null; // Return null if no result is found
        };
    }

    public static function get_meta_by_xcode($xcode)
    {
        global $connection;
        $meta_key = 'x_code';
        $stmt = $connection->prepare("SELECT * FROM user_meta WHERE meta_key = ? AND meta_value = ?");

        $stmt->bind_param("ss", $meta_key, $xcode);

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public static function getAllUsersdata()
    {
        global $connection;
        $stmt = $connection->prepare("SELECT * FROM users where user_level=1");
        $stmt->execute();
        $result = $stmt->get_result();
        $users_data = $result->fetch_all(MYSQLI_ASSOC);
        $users_x_code = self::get_users_meta_by_key('x_code');
        $users_configuration_status = self::get_users_configuration_status();
        $users_phone = self::get_users_meta_by_key('phone');
        $users_business_name = self::get_users_meta_by_key('business_name');

        $users_data = [
            'data' => $users_data,
            'users_configuration_status' => $users_configuration_status,
            'users_phone' => $users_phone,
            'business_name' => $users_business_name,
            'users_x_code' => $users_x_code
        ];

        return $users_data;
    }


    public static function logout()
    {
        setcookie('jwt_token', '', time() - 3600, '/', $_SERVER['HTTP_HOST']);

        // Return a response indicating successful logout
        http_response_code(200);
        return json_encode(
            array(
                "message" => "Logged out successfully.",
                "status_code" => 200
            )
        );
    }

    public static function isUserLoggedIn()
    {
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



    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    //JWT Authentication
    public static function loginWithJWT($email, $password)
    {
        global $connection;

        if (!empty($email) && !empty($password)) {
            $stmt = $connection->prepare("SELECT id, user_level, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $userId = $user['id'];
                    $user_level = $user['user_level'];
                    // echo $user_level;
                    // exit;
                    $secretKey = "irrULnPSFnSrV1Y65cdV";
                    $issuedAt = time();
                    $expirationTime = $issuedAt + 3600;  // jwt valid for 1 hour
                    $payload = array(
                        'user_id' => $userId,
                        'user_level' => $user_level,
                        'iat' => $issuedAt,
                        'exp' => $expirationTime
                    );

                    $jwt = JWT::encode($payload, $secretKey, 'HS256');
                    // setcookie('jwt_token', $jwt, $expirationTime, 'storemanagement-backend.test/');
                    setcookie('jwt_token', $jwt, $expirationTime, '/', $_SERVER['HTTP_HOST']);

                    http_response_code(200);
                    return json_encode(
                        array(
                            "message" => "Logged in successfully.",
                            "token" => $jwt,
                            "status_code" => 200
                        )
                    );
                } else {
                    http_response_code(401);
                    return json_encode(
                        array(
                            "message" => "Login failed. Password does not match.",
                            "status_code" => 401
                        )
                    );
                }
            } else {
                http_response_code(404);
                return json_encode(
                    array(
                        "message" => "Login failed. User not found.",
                        "status_code" => 404
                    )
                );
            }
            $stmt->close();
        } else {
            http_response_code(400);
            return json_encode(
                array(
                    "message" => "Login failed. Data is incomplete.",
                    "status_code" => 400
                )
            );
        }
    }


    public static function verifyJWT($jwt)
    {
        $secretKey = "irrULnPSFnSrV1Y65cdV";
        try {
            $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
            return $decoded;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function isUserLoggedInApp()
    {
        $jwt = $_COOKIE['jwt_token'] ?? null;

        if ($jwt) {
            $decoded = self::verifyJWT($jwt);
            if ($decoded && isset($decoded->user_id)) {
                return true;
            }
        }
        return false;
    }

    public static function getUserIdFromToken()
    {
        if (isset($_COOKIE['jwt_token'])) {
            $jwt = $_COOKIE['jwt_token'];
        } else {
            return null;
        }

        // Verify the JWT token
        $decoded = self::verifyJWT($jwt);
        if ($decoded && isset($decoded->user_id)) {
            return $decoded->user_id;
        }

        return null;
    }

    public static function getUserLevelFromToken($jwt_token = null)
    {
        if ($jwt_token != null) {
            $jwt = $jwt_token;
        } else if (isset($_COOKIE['jwt_token'])) {
            $jwt = $_COOKIE['jwt_token'];
        } else {
            return null;
        }

        // Verify the JWT token
        $decoded = self::verifyJWT($jwt);
        if ($decoded && isset($decoded->user_id)) {
            return $decoded->user_level;
        }

        return null;
    }


}