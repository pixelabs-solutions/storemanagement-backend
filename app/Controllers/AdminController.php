<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Authentication;

class AdminController{

    public function index(){
        $user_level = Authentication::getUserLevelFromToken();
        if($user_level == ADMIN)
        {
            $customer_data =  Authentication::getAllUsersdata();
            include_once __DIR__ . '/../Views/admin/index.php';
        }
    }
  
}