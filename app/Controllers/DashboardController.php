<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Dashboard;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Authentication;
use Pixelabs\StoreManagement\Models\Currency;

use Pixelabs\StoreManagement\Helpers\RequestTracker;

class DashboardController
{

    public function index()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $user_id = Authentication::getUserIdFromToken();
        if($user_id === null)
        {
            if ($is_rest == 'true') {
                http_response_code(401);
                echo json_encode(array(
                    "message" => "User not authenticated",
                    "status_code" => 401
                ));
                exit;
            }
            else{
                header('Location: /authentication/login');
            }
        }
        
        
        $user_level = Authentication::getUserLevelFromToken();
        if ($user_level == ADMIN) {
            header("Location: /admin/index");
        } else {
            RequestTracker::trackRequest();
            $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
            
            if(isset($_GET['query']) || isset($_GET['date_from']) || isset($_GET['date_to'])){
                $filters = [
                    'query' => $_GET['query'] ?? null,
                    'date_from' => $_GET['date_from'] ?? null,
                    'date_to' => $_GET['date_to'] ?? null
                ];
            } else{
                $filters = [
                    'query' => '24_hours'
                ];
            }
         

            $stats = Dashboard::get_dashboard_stats($filters);
            $customers_location = Dashboard::get_dashboard_data();
            $top_products = Dashboard::fetchTopSellingProductImages();
            
            $requests = RequestTracker::getRequestsLastSevenDays();
            $currency = Currency::get_current_currency($user_id); 
 
            $dashboard_data = [
                'statistics' => $stats,
                'customers_location' => $customers_location,
                'top_products' => $top_products,
                'current_currency' => $currency,
                'requests' => $requests
            ];
            var_dump($dashboard_data);
            if ($is_rest == 'true') {
                echo json_encode($dashboard_data, JSON_UNESCAPED_UNICODE);
            } else {
                include_once __DIR__ . '/../Views/dashboard/index.php';
            }
        }


    }
}