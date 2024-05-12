<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Statistics;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;

class StatisticsController
{
    public function index()
    {
        include_once __DIR__ . '/../Views/statistics/overview.php';
    }

    public function products()
    {
        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];
        $products_stats = Statistics::get_products_stats($filters);
        echo json_encode($products_stats);
    }

    public function orders()
    {
        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $orders_stats = Statistics::get_orders_stats($filters);
        echo json_encode($orders_stats);
    }

    public function revenue()
    {
        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $revenue_stats = Statistics::get_revenue_stats($filters);
        echo json_encode($revenue_stats);
    }

    public function overview()
    {
        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $overview_stats = Statistics::get_overview_stats($filters);
        echo json_encode($overview_stats);
    }
}