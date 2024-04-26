<?php 

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Base;


class InventoryController
{
    private $table_name = 'inventory_settings';

    public function index()
    {
        
        include_once __DIR__ . '/../Views/inventory/settings.php';
    }
}