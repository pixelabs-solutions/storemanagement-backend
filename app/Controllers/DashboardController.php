<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Dashboard;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Authentication;

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
            $response = Configuration::getConfiguration($is_rest);
            $result = json_decode($response, true);
            if ($is_rest && $result['status_code'] != 200) {
                echo $response;
                exit;
            }

            $configuration = $result['data'];



            $filters = [
                'query' => $_GET['query'] ?? null,
                'date_from' => $_GET['date_from'] ?? null,
                'date_to' => $_GET['date_to'] ?? null
            ];

            $stats = Dashboard::get_dashboard_stats();
            $customers_location = Dashboard::get_dashboard_data();
            $top_products = Dashboard::fetchTopSellingProductImages();
            $requests = RequestTracker::getRequestsLastSevenDays();

            $dashboard_data = [
                'statistics' => $stats,
                'customers_location' => $customers_location['customers_location'],
                'latest_orders' => $customers_location['latest_orders'],
                'top_products' => $top_products,
                'requests' => $requests
            ];

            if ($is_rest == 'true') {
                echo json_encode($dashboard_data, JSON_UNESCAPED_UNICODE);
            } else {
                include_once __DIR__ . '/../Views/dashboard/index.php';
            }
        }


    }
}