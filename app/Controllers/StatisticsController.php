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
        print_r($products_stats);
    }

    public function orders()
    {
        $filters = [
            'query' => $_GET['query'] ?? null,
            'date_from' => $_GET['date_from'] ?? null,
            'date_to' => $_GET['date_to'] ?? null
        ];

        $orders_stats = Statistics::get_orders_stats($filters);
        print_r($orders_stats);
    }
}