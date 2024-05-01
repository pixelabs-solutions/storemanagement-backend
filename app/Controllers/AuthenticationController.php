<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Authentication;

class AuthenticationController
{
    public function register()
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);
        
        $email = isset($data['email']) ? $data['email'] : null;
        $password = isset($data['password']) ? $data['password'] : null;
        $result = Authentication::register($email, $password);

        echo $result;
    }

    public function login()
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);

        $email = isset($data['email']) ? $data['email'] : null;
        $password = isset($data['password']) ? $data['password'] : null;

        $result = Authentication::login($email, $password);

        echo $result;
    }

    public function logout()
    {
        $result = Authentication::logout();
        echo $result;
        
        // header('Location: /authentication/login');
        // exit;
    }

}
