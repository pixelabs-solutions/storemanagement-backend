<?php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Base;


class TransactionController
{
    private $table_name = 'transactions';

    public function index()
    {
        $orders = Base::get_all($this->table_name);
        include_once __DIR__ . '/../Views/transaction/index.php';
    }
}