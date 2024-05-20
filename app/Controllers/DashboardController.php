<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Authentication;
use Pixelabs\StoreManagement\Models\Dashboard;

class DashboardController
{
    public function index()
    {
        if(isset($_GET['is_rest']) && $_GET['is_rest'] === "true")
        {
            
        }
        if(!Authentication::isUserLoggedIn()){
            //Redirect user to login page
            header('Location: /authentication/login');
        }
        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $stats = Dashboard::get_dashboard_stats($filters);
        $customers_location = Dashboard::get_dashboard_data();
        $top_products = Dashboard::fetchTopSellingProductImages();

        $dashboard_data = [
            'statistics' => $stats,
            'customers_location' => $customers_location['customers_location'],
            'latest_orders' => $customers_location['latest_orders'],
            'top_products' => $top_products
        ];
        
        // print_r(json_encode($dashboard_data));
        include_once __DIR__ . '/../Views/dashboard/index.php';
    }
}