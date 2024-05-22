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
        return $response;
    }

    public function login_user()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        if(isset($_GET['is_rest']) && $_GET['is_rest'] === "true")
        {
            $response = Authentication::loginWithJWT($email, $password);
            echo $response;
        }
        else
        {
            $response = Authentication::login($email, $password);
            header('Location: /index');
        }
        
    }

    public function logout()
    {
        $result = Authentication::logout();
        
        header('Location: /authentication/login');
        // exit;
    }

}
