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
        $user_level = 0;
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


        $goalTable = "CREATE TABLE products (
            id INT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            images TEXT,
            categories TEXT,
            regular_price DECIMAL(10, 2),
            sale_price DECIMAL(10, 2),
            stock_quantity INT,
            description TEXT,
            type VARCHAR(50),
            attributes TEXT,
            variations TEXT,
            date_created DATETIME
        )

        ";
        $this->connection->query($goalTable);

        $categoriesTable = "CREATE TABLE IF NOT EXISTS categories
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(55),
            parent_category_id INT,
            image VARCHAR(255)
        )";
        $this->connection->query($categoriesTable);

        $productsTable = "CREATE TABLE IF NOT EXISTS products
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            units_in_stock INT(6),
            description VARCHAR(255),
            thumbnail VARCHAR(255),
            sale_price FLOAT,
            normal_price FLOAT,
            photo_gallery TEXT,
            category_id INT,
            product_type ENUM('normal', 'variation') NOT NULL DEFAULT 'normal'
        )";
        $this->connection->query($productsTable);


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

        $requestTrackingTable = "CREATE TABLE `request_tracking` (
            `id` int(11) NOT NULL,
            `ip_address` varchar(45) NOT NULL,
            `request_date` date NOT NULL,
            `is_mobile` tinyint(1) NOT NULL DEFAULT 0
        )";
        $this->connection->query($requestTrackingTable);
    }
}
