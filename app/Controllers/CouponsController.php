<?php

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;

class CouponsController
{
    private $table_name = 'coupons';
    public function index()
    {
        $coupons = Base::get_all($this->table_name);
        include_once __DIR__ . '/../Views/coupons/index.php';
    }

}
