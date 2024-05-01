<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Authentication;

class DashboardController
{
    public function index()
    {
        if(!Authentication::isUserLoggedIn()){
            //Redirect user to login page
            return;
        }
        
        include_once __DIR__ . '/../Views/dashboard/index.php';
    }
}