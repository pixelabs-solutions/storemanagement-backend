<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Authentication;
use Pixelabs\StoreManagement\Models\Dashboard;

class DashboardController
{
    public function index()
    {
        $user_id = "";
        if(isset($_GET['is_rest']) && $_GET['is_rest'] === "true") {
            $user_id = Authentication::getUserIdFromToken();
            if($user_id === null){
                echo json_encode([
                        "message" => "User not authenticated.",
                        "status_code" => 401 
                    ]);
                exit();
            }            
        }
        else {
            $user_id = Authentication::getUserId();
            if($user_id === null){
                header('Location: /authentication/login');
            }
        }

        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $stats = Dashboard::get_dashboard_stats($filters, $user_id);
        $customers_location = Dashboard::get_dashboard_data($user_id);
        $top_products = Dashboard::fetchTopSellingProductImages($user_id);

        $dashboard_data = [
            'statistics' => $stats,
            'customers_location' => $customers_location['customers_location'],
            'latest_orders' => $customers_location['latest_orders'],
            'top_products' => $top_products
        ];
        
        echo json_encode($dashboard_data, JSON_UNESCAPED_UNICODE);
        //include_once __DIR__ . '/../Views/dashboard/index.php';
    }
}