<?php

// Include the autoloader to autoload classes
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use Pixelabs\StoreManagement\Config\Database;

// Database connection details
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

$database = new Database($host, $username, $password, $database);
$connection = $database->getConnection();
define('BASE_DIR', __DIR__);
define('ADMIN', 2);
define('USER', 1);

// Create a new instance of the application
$app = new Pixelabs\StoreManagement\Application();

// Define routes
require_once __DIR__ . '/../config/routes.php';

// Run the application
$app->run();
