<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Authentication;

class AuthenticationController
{

    public function register()
    {
        include_once __DIR__ . '/../Views/authentication/register.php';
    }
    public function login()
    {
        include_once __DIR__ . '/../Views/authentication/login.php';
    }
    public function register_user()
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);
        
        $email = isset($data['email']) ? $data['email'] : null;
        $password = isset($data['password']) ? $data['password'] : null;
        $result = Authentication::register($email, $password);

        echo $result;
    }

    public function login_user()
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
