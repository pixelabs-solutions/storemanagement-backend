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
        include_once __DIR__ . '/../Views/statistics/products.php';

    }

    public function orders()
    {
        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $orders_stats = Statistics::get_orders_stats($filters);
        include_once __DIR__ . '/../Views/statistics/orders.php';

    }

    public function revenue()
    {
        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $revenue_stats = Statistics::get_revenue_stats($filters);
        include_once __DIR__ . '/../Views/statistics/revinue.php';


    }

    public function overview()
    {
        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $overview_stats = Statistics::get_overview_stats($filters);
        $orders_stats = Statistics::get_orders_stats($filters);
        $revenue_stats = Statistics::get_revenue_stats($filters);
        $products_stats = Statistics::get_products_stats($filters);

        include_once __DIR__ . '/../Views/statistics/overview.php';

    }
}