<?php

namespace Pixelabs\StoreManagement\Controllers;

class StatisticsController
{
    public function index()
    {
        include_once __DIR__ . '/../Views/statistics/overview.php';
    }
}