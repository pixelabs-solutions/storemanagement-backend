<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Statistics;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;

class StatisticsController
{
    public function index()
    {
        include_once __DIR__ . '/../Views/statistics/overview.php';

    }

    public function products()
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];
        $products_stats = Statistics::get_products_stats($configuration, $filters);
        if($is_rest == 'true'){
            echo json_encode($products_stats);
        }
        else{
            include_once __DIR__ . '/../Views/statistics/products.php';
        }

    }

    public function orders()
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $orders_stats = Statistics::get_orders_stats($configuration, $filters);
        if($is_rest == 'true'){
            echo json_encode($orders_stats);
        }
        else{
            include_once __DIR__ . '/../Views/statistics/orders.php';
        }

    }

    public function revenue()
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $revenue_stats = Statistics::get_revenue_stats($configuration, $filters);
        if($is_rest == 'true'){
            echo json_encode($revenue_stats);
        }
        else{
            include_once __DIR__ . '/../Views/statistics/revinue.php';
        }


    }

    public function overview()
    {
        $is_rest = (isset($_GET['is_rest']) && $_GET['is_rest']) == 1 ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $overview_stats = Statistics::get_overview_stats($configuration, $filters);
        $orders_stats = Statistics::get_orders_stats($configuration, $filters);
        $revenue_stats = Statistics::get_revenue_stats($configuration, $filters);
        $products_stats = Statistics::get_products_stats($configuration, $filters);

        if($is_rest == 'true'){
            $data = [
                'overview_stats' => $overview_stats,
                'orders_stats' => $orders_stats,
                'revenue_stats' => $revenue_stats,
                'products_stats' => $products_stats
            ];
            echo json_encode($data);
        }
        else{
            include_once __DIR__ . '/../Views/statistics/overview.php';
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