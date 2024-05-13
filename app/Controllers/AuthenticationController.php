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
        $name = isset($_POST['name']) ? $_POST['name']: null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $result = Authentication::register($name, $email, $password);
        $response = json_decode($result, true);
        if($response['status_code'] == 201)
        {
            header('Location: /authentication/login');
        }
        echo $response['message'];
    }

    public function login_user()
    {
        // $rawData = file_get_contents("php://input");
        // $data = json_decode($rawData, true);
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $result = Authentication::login($email, $password);
        $response = json_decode($result, true);
        if($response['status_code'] == 200)
        {
            header('Location: /index');
        }
        echo $response['message'];
    }

    public function logout()
    {
        $result = Authentication::logout();
        
        header('Location: /authentication/login');
        // exit;
    }

}
