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
            
            if (isset($_GET['query']) || isset($_GET['date_from']) || isset($_GET['date_to'])) {
                $filters = [
                    'query' => $_GET['query'] ?? null,
                    'date_from' => $_GET['date_from'] ?? null,
                    'date_to' => $_GET['date_to'] ?? null
                ];
            
                $historicFilters = $filters; // Copy initial filters
                unset($historicFilters["query"]);
            
                $historicFilters["historic_query"] = $filters["query"];
            } else {
                $filters = [
                    'query' => '24_hours'
                ];

                $historicFilters["historic_query"] = "24_hours";


            }

            // echo json_encode($historicFilters);




            $statsHistoric = Dashboard::get_dashboard_stats($historicFilters);
         

            $stats = Dashboard::get_dashboard_stats($filters);

            $percentage_changes = [
                'new_products' => $this->calculate_percentage_change($statsHistoric['new_products'], $stats['new_products']),
                'new_customers' => $this->calculate_percentage_change($statsHistoric['new_customers'], $stats['new_customers']),
                'total_orders' => $this->calculate_percentage_change($statsHistoric['total_orders'], $stats['total_orders']),
                'total_transactions' => $this->calculate_percentage_change($statsHistoric['total_transactions'], $stats['total_transactions']),
            ];

            $customers_location = Dashboard::get_dashboard_data($filters);
            $top_products = Dashboard::fetchTopSellingProductImages();
            
            $requests = RequestTracker::getRequestsLastSevenDays();
            $currency = Currency::get_current_currency($user_id); 
 
            $dashboard_data = [
                'statistics' => $stats,
                'customers_location' => $customers_location,
                'top_products' => $top_products,
                'current_currency' => $currency,
                'requests' => $requests,
                "percentage_changes" =>  $percentage_changes 
            ];
            if ($is_rest == 'true') {
                echo json_encode($dashboard_data, JSON_UNESCAPED_UNICODE);
            } else {
                include_once __DIR__ . '/../Views/dashboard/index.php';
            }
        }


    }

    // private function calculate_percentage_change($historic, $latest) {
    //     // Check if both historic and latest values are 0
    //     if ($historic == 0 && $latest == 0) {
    //         return 0; // If both are 0, percentage change is 0%
    //     } elseif ($historic == 0) {
    //         // Handle the case when historic data is 0
    //         return '100+'; // Indicate a very large increase
    //     } else {
    //         return (($latest - $historic) / abs($historic)) * 100;
    //     }
    // }

    private function calculate_percentage_change($previousValue, $currentValue)
    {
        // Calculate percentage change
        if ($previousValue != 0) {
            $percentageChange = (($currentValue - $previousValue) / abs($previousValue)) * 100;
        } else {
            // Handle the case where $previousValue is zero (to avoid division by zero)
            if ($currentValue > 0) {
                $percentageChange = 100; // Treat as +100% if $currentValue is positive
            } elseif ($currentValue < 0) {
                $percentageChange = -100; // Treat as -100% if $currentValue is negative
            } else {
                $percentageChange = 0; // No change if both are zero
            }
        }

        // Format the percentage change with a sign
        $formattedPercentage = sprintf("%+.2f%%", $percentageChange);

        return $formattedPercentage;
    }
}