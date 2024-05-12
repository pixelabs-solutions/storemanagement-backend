<?php 

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Customer;

class CustomerController
{
    private $table_name = 'customers';
    public function index()
    {
        $customers = Customer::get_customers();

        // echo $customers;
        include_once __DIR__ . '/../Views/customers/index.php';
    }
}