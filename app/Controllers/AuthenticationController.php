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

        $first_name = isset($_POST['first_name']) ? $_POST['first_name']: null;
        $last_name = isset($_POST['last_name']) ? $_POST['last_name']: null;
        $name = $first_name . " " . $last_name;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
        $business_name = isset($_POST['business_name']) ? $_POST['business_name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;

        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $result = Authentication::register($name, $email, $password, $phone, $business_name);
        $response = json_decode($result, true);
        if(isset($_GET['is_rest']) && $_GET['is_rest'] === "true") {
            echo $result;
            exit;
        }
        else {
            header('Location: /admin/index');
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
                
                $user_level = Authentication::getUserLevelFromToken($result['token']);
                // echo "USer level:" . $user_level;
                // echo "admin = " .ADMIN;
                if($user_level === ADMIN)
                { 
                   
                    header('Location: /admin/index');
                }
                else{
                    header('Location: /index');

                }
            }
            else {
                $error_message = isset($result['message']) ? $result['message'] : 'Invalid email or password.';
                header('Location: /authentication/login?error=' . urlencode($error_message));
            }
        }
        
    }


    public function forgot_password()
    {
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $user_id = Authentication::getUserIdFromToken();
        $response = Authentication::forgot_password($password, $user_id);
        if(isset($_GET['is_rest']) && $_GET['is_rest'] === "true")
        { 
            echo $response;
            exit;
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
