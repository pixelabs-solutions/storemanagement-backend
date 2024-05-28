<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Dashboard;
use Pixelabs\StoreManagement\Models\Configuration;
class DashboardController
{

    public function index()
    {
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

        $stats = Dashboard::get_dashboard_stats($configuration, $filters);
        $customers_location = Dashboard::get_dashboard_data($configuration);
        $top_products = Dashboard::fetchTopSellingProductImages($configuration);

        $dashboard_data = [
            'statistics' => $stats,
            'customers_location' => $customers_location['customers_location'],
            'latest_orders' => $customers_location['latest_orders'],
            'top_products' => $top_products
        ];

        if($is_rest == 'true') {
            echo json_encode($dashboard_data, JSON_UNESCAPED_UNICODE);
        }
        else {
        include_once __DIR__ . '/../Views/dashboard/index.php';
        }

    }
}