<?php
// config/Database.php

namespace Pixelabs\StoreManagement\Config;

class Database
{
    protected $connection;

    public function __construct($host, $username, $password, $database)
    {
        $this->connection = new \mysqli($host, $username, $password);

        // Check if the connection was successful
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        if (!$this->databaseExists($database)) {
            $this->createDatabase($database);
        }

        $this->connection->select_db($database);

        $this->connection->set_charset("utf8");
        if (!$this->tablesExist()) {
            $this->createTables();
        }

    }

    private function databaseExists($database)
    {
        $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $database);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
    private function tablesExist()
    {
        //List all tables in array
        $tables = ['users', 'user_meta', 'user_configurations', 'goals', 'categories', 'products', 'inventory_settings', 'coupons', 'customers', 'transactions', 'request_tracking'];
        $tableNameList = "'" . implode("', '", $tables) . "'"; // Create a string for the SQL query
        $query = "SELECT COUNT(*) AS count FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = DATABASE() AND table_name IN ($tableNameList)";
        $result = $this->connection->query($query);
        $row = $result->fetch_assoc();

        return $row['count'] == count($tables);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    private function createDatabase($database)
    {
        $query = "CREATE DATABASE IF NOT EXISTS $database";
        if ($this->connection->query($query) === TRUE) {
        } else {
            die("Error creating database: " . $this->connection->error);
        }
    }

    // Add methods to load SQL structure, execute queries, etc.
    private function createTables()
    {
        $createUsersTableQuery = "CREATE TABLE IF NOT EXISTS users
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(50) NOT NULL UNIQUE,
            user_level TINYINT,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->connection->query($createUsersTableQuery);


        // Define admin user details
        $name = 'Admin';
        $username = 'admin';
        $email = 'admin@woo-management.com';
        $user_level = 2;
        $adminPassword = 'admin123';

        // Check if the admin user already exists
        $checkUserQuery = "SELECT id FROM users WHERE username = ? OR email = ?";
        $stmt = $this->connection->prepare($checkUserQuery);
        $stmt->bind_param('ss', $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {
            // Admin user does not exist, proceed with insertion
            $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

            // SQL query to insert the admin user
            $insertAdminUserQuery = "INSERT INTO users (name, username, email, user_level, password) VALUES (?, ?, ?, ?, ?)";
            $stmtInsert = $this->connection->prepare($insertAdminUserQuery);
            $stmtInsert->bind_param('sssds', $name, $username, $email, $user_level, $hashedPassword);
            $stmtInsert->execute();
            $stmtInsert->close();
        } else {
            // Admin user already exists
            echo "Admin user already exists.";
        }

        // Close the statement
        $stmt->close();


        $createUserMetaTableQuery = "CREATE TABLE IF NOT EXISTS user_meta
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            meta_key VARCHAR(50) NOT NULL,
            meta_value VARCHAR(50) NOT NULL
        ) ";
        $this->connection->query($createUserMetaTableQuery);

        $userConfigurationsTable = "CREATE TABLE IF NOT EXISTS user_configurations
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL UNIQUE,
            consumer_key VARCHAR(255) UNIQUE NOT NULL,
            consumer_secret VARCHAR(255) UNIQUE NOT NULL,
            store_url VARCHAR(255) UNIQUE NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->connection->query($userConfigurationsTable);


        $goalTable = "CREATE TABLE IF NOT EXISTS goals
            (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT(20),
                new_orders_target INT(20),
                new_customers_target INT(20),
                sales_revenue_target INT(20),
                target_keywords VARCHAR(255),
                google_rankings_target INT(20),
                page_views_target INT(20),
                avg_order_value_increase_target FLOAT,
                avg_order_items_increase_target FLOAT,
                new_products_target INT(20),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ";
        $this->connection->query($goalTable);

        $categoriesTable = "CREATE TABLE `categories` (
            `id` int(11) NOT NULL,
            `name` varchar(255) NOT NULL,
            `parent` int(11) DEFAULT NULL,
            `image` text DEFAULT NULL,
            `count` int(11) DEFAULT NULL
            )";
        $this->connection->query($categoriesTable);

        $productsTable = "CREATE TABLE `products` (
            `id` int(11) NOT NULL,
            `name` varchar(255) NOT NULL,
            `images` text DEFAULT NULL,
            `categories` text DEFAULT NULL,
            `regular_price` decimal(10,2) DEFAULT NULL,
            `sale_price` decimal(10,2) DEFAULT NULL,
            `stock_quantity` int(11) DEFAULT NULL,
            `description` text DEFAULT NULL,
            `type` varchar(50) DEFAULT NULL,
            `attributes` text DEFAULT NULL,
            `variations` text DEFAULT NULL,
            `date_created` datetime DEFAULT NULL
            )";
        $this->connection->query($productsTable);

        $currencies = "CREATE TABLE currencies (
            `id` int(11) NOT NULL,
            `name` varchar(255) NOT NULL,
            `symbol` varchar(255) NOT NULL,
        )";
        $this->connection->query($currencies);

        $inventorySettingsTable = "CREATE TABLE IF NOT EXISTS inventory_settings
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL UNIQUE,
            is_inventory_management_enabled BOOLEAN,
            is_out_of_stock_alert_enabled BOOLEAN,
            is_low_stock_alert_enabled BOOLEAN,
            email VARCHAR(255),
            out_of_stock_threshold INT(6),
            low_stock_threshold INT(6)
        )";
        $this->connection->query($inventorySettingsTable);

        $couponsTable = "CREATE TABLE IF NOT EXISTS coupons
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            coupon_code VARCHAR(255) NOT NULL,
            coupon_type VARCHAR(255),
            discount_type VARCHAR(255), 
            discount_amount FLOAT,
            expiry_date DATE 
        )";
        $this->connection->query($couponsTable);

        $customersTable = "CREATE TABLE IF NOT EXISTS customers
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(55) NOT NULL,
            email VARCHAR(55) NOT NULL
        )";
        $this->connection->query($customersTable);

        $transactionsTable = "CREATE TABLE IF NOT EXISTS transactions
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            customer_id INT NOT NULL,
            product_id INT NOT NULL,
            status VARCHAR(55),
            order_date DATE,
            sum FLOAT,
            source VARCHAR(55),
            shipping_address VARCHAR(255)
        )";
        $this->connection->query($transactionsTable);

        $requestTrackingTable = "CREATE TABLE IF NOT EXISTS `request_tracking` (
            `id` int(11) NOT NULL,
            `ip_address` varchar(45) NOT NULL,
            `request_date` date NOT NULL,
            `is_mobile` tinyint(1) NOT NULL DEFAULT 0
        )";
        $this->connection->query($requestTrackingTable);

        $localAttributes = "CREATE TABLE IF NOT EXISTS `attributes` (
            `id` int(11) NOT NULL,
            `name` varchar(45) NOT NULL,
            `type` varchar(45) NOT NULL
        )";
        $this->connection->query($localAttributes);
    }
}
