<?php

namespace Pixelabs\StoreManagement\Models;


class Base
{
    
    public function __construct(){

    }

    public static function get_all($table_name)
    {
        global $connection;
        $table_name = $connection->real_escape_string($table_name); 
        $sql = "SELECT * FROM `$table_name`";
        $result = $connection->query($sql);
        $data = [];
        if ($result) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
        return $data;
    }
    public static function get_by_id($table_name, $id){
        global $connection;
        $sql = "SELECT * FROM `$table_name` WHERE id = ?";
        $stmt = $connection->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Failed to prepare the SQL statement: " . $connection->error);
        }
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $stmt->close();
            return $data;
        } else {
            $stmt->close();
            throw new Exception("Failed to execute the SQL statement: " . $connection->error);
        }                                                                   
    }
    
    public static function delete_by_id($table_name, $id){
        global $connection;

        $table_name = $connection->real_escape_string($table_name);

        $sql = "DELETE FROM `$table_name` WHERE id = ?";
        $stmt = $connection->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Failed to prepare the SQL statement: " . $this->connection->error);
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            $stmt->close();
            throw new Exception("Execution failed: " . $stmt->error);
        }

        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows > 0;
    }

}