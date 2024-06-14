<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Statistics;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Authentication;
use Pixelabs\StoreManagement\Models\Currency;

class StatisticsController
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
        include_once __DIR__ . '/../Views/statistics/overview.php';
            }
    }

    public function products()
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
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';

        // $filters = [
        //     'query' => $_GET['query'] ?? null,
        //     'date_from' => $_GET['date_from'] ?? null,
        //     'date_to' => $_GET['date_to'] ?? null
        // ];

        if(isset($_GET['query']) || isset($_GET['date_from']) || isset($_GET['date_to'])){
            $filters = [
           'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
            ];
        } else{
            $filters = [
                'query' => 'last_week'
            ];
        }
        $currency = Currency::get_current_currency($user_id); 

        $products_stats = Statistics::get_products_stats($filters);
        if($is_rest == 'true'){
            echo json_encode($products_stats);
        }
        else{
            include_once __DIR__ . '/../Views/statistics/products.php';
        }
    }
    }

    public function orders()
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
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';

        if(isset($_GET['query']) || isset($_GET['date_from']) || isset($_GET['date_to'])){
            $filters = [
           'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
            ];
        } else{
            $filters = [
                'query' => 'last_week'
            ];
        }

        $orders_stats = Statistics::get_orders_stats($filters);
        if($is_rest == 'true'){
            echo json_encode($orders_stats);
        }
        else{
            include_once __DIR__ . '/../Views/statistics/orders.php';
        }

    }}

    public function revenue()
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
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';

        if(isset($_GET['query']) || isset($_GET['date_from']) || isset($_GET['date_to'])){
            $filters = [
           'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
            ];
        } else{
            $filters = [
                'query' => 'last_week'
            ];
        }

        $revenue_stats = Statistics::get_revenue_stats($filters);
        if($is_rest == 'true'){
            echo json_encode($revenue_stats);
        }
        else{
            include_once __DIR__ . '/../Views/statistics/revinue.php';
        }


    }}

    public function overview()
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
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';

        if(isset($_GET['query']) || isset($_GET['date_from']) || isset($_GET['date_to'])){
            $filters = [
           'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
            ];
        } else{
            $filters = [
                'query' => 'last_week'
            ];
        }
        // echo json_encode($filters);exit;

        $overview_stats = Statistics::get_overview_stats($filters);
        $orders_stats = Statistics::get_orders_stats($filters);
        $revenue_stats = Statistics::get_revenue_stats($filters);
        $products_stats = Statistics::get_products_stats($filters);
        $currency = Currency::get_current_currency($user_id); 

        if($is_rest == 'true'){
            echo json_encode($overview_stats);
        }
        else{
            include_once __DIR__ . '/../Views/statistics/overview.php';
        }
    }
    }


    public function prepare_configuration($is_rest){
        $response = Configuration::getConfiguration($is_rest);
        $result = json_decode($response, true);
        if ($is_rest && $result['status_code'] != 200) {
            echo $response;
            exit;
        }
        
        return $result['data'];
    }
}