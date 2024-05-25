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
        if(isset($_GET['is_rest']) && $_GET['is_rest'] === "true") {
            echo $result;
            exit;
        }
        else {
            header('Location: /authentication/login');
        }
    }

    public function login_user()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $response = Authentication::loginWithJWT($email, $password);
        if(isset($_GET['is_rest']) && $_GET['is_rest'] === "true")
        {
            echo $response;
            exit;
        }
        else
        {
            $result = json_decode($response, true);
            if($result["status_code"] === 200){
                header('Location: /index');
            }
            else {
                header('Location: /authentication/login');
            }

        }
        
    }

    public function logout()
    {
        $result = Authentication::logout();
        if(isset($_GET['is_rest']) && $_GET['is_rest'] === "true") {
            echo $result;
            exit;
        }
        
        header('Location: /authentication/login');
        // exit;
    }

}
