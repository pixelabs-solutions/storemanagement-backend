<?php

// Include the autoloader to autoload classes
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use Pixelabs\StoreManagement\Config\Database;
use Pixelabs\StoreManagement\Models\Currency;
use Pixelabs\StoreManagement\Models\Authentication;

// Database connection details
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

$database = new Database($host, $username, $password, $database);
$connection = $database->getConnection();

$user_id = Authentication::getUserIdFromToken();

if($user_id){
    $currency = Currency::get_current_currency($user_id); 
}


define('BASE_DIR', __DIR__);
define('ADMIN', 2);
define('USER', 1);
if(!empty($currency)){
    define('CURRENT_CURRENCY', $currency[0]["symbol"]);
}

// Create a new instance of the application
$app = new Pixelabs\StoreManagement\Application();

// Define routes
require_once __DIR__ . '/../config/routes.php';

// Run the application
$app->run();
