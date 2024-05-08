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

    public function products($filter = null)
    {
        if(isset($_GET['filter']) && $_GET['filter'] !== ""){

            $products_stats = Statistics::get_products_stats($_GET['filter']);
        }

        print_r($products_stats);
    }
}