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
        $user_level = Authentication::getUserLevelFromToken();
        if ($user_level == ADMIN) {
            header("Location: /admin/index");
        } else {
            RequestTracker::trackRequest();
            $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
            
            $filters = [
                'query' => $_GET['query'] ?? null,
                'date_from' => $_GET['date_from'] ?? null,
                'date_to' => $_GET['date_to'] ?? null
            ];

            $stats = Dashboard::get_dashboard_stats($filters);
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