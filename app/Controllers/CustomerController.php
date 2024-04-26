<?php 

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Base;

class CustomerController
{
    private $table_name = 'customers';
    public function index()
    {
        $customers = Base::get_all($this->table_name);
        include_once __DIR__ . '/../Views/customers/index.php';
    }
}