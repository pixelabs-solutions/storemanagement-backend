<?php 

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Customer;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Authentication;

class CustomerController
{
    private $table_name = 'customers';
    public function index()
    {

        $user_level = Authentication::getUserLevelFromToken();
        if ($user_level == ADMIN) {
            header("Location: /admin/index");
            } else {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        
        $customers = Customer::get_customers($configuration);
        if($is_rest == "true")
        {
            echo json_encode($customers, JSON_UNESCAPED_UNICODE);
        }else{
            include_once __DIR__ . '/../Views/customers/index.php';
        }
        // echo $customers;
    }}
    public function prepare_configuration($is_rest){
        $response = Configuration::getConfiguration($is_rest);
        $result = json_decode($response, true);
        if ($is_rest && $result['status_code'] != 200) {
            echo $response;
            exit;
        }
        
        return $result['data'];
    }
}