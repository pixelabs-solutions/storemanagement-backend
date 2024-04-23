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

        $this->createTables();
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
    private function createTables(){
        $createUsersTableQuery = "CREATE TABLE IF NOT EXISTS users
        (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->connection->query($createUsersTableQuery);

        $createUserMetaTableQuery = "
        CREATE TABLE IF NOT EXISTS user_meta
        (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) NOT NULL,
            meta_key VARCHAR(50) NOT NULL,
            meta_value VARCHAR(50) NOT NULL
        ) ";
        $this->connection->query($createUserMetaTableQuery);

        $apiCredentialsTable = "
        CREATE TABLE IF NOT EXISTS api_credentials
        (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) NOT NULL,
            consumer_key TEXT NOT NULL,
            consumer_secret TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->connection->query($apiCredentialsTable);

        $goalTable = "
            CREATE TABLE IF NOT EXISTS goals
            (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                new_orders_target INT(20),
                new_customers_target INT(20),
                sales_revenue_target INT(20),
                target_keywords INT(20),
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




    }
}
