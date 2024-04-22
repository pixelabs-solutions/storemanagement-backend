<?php
// config/Database.php

namespace Pixelabs\StoreManagement\Config;

class Database
{
    protected $connection;

    public function __construct($host, $username, $password, $database)
    {
        $this->connection = new \mysqli($host, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    // Add methods to load SQL structure, execute queries, etc.
}
