<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Authentication;

class AuthenticationController
{
    public function register()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $result = Authentication::register($email, $password);

        $response = json_decode($result, true);

        http_response_code($response['status_code']);
        header('Content-Type: application/json');

        echo $result;
    }

}
