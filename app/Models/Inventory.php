<?php

namespace Pixelabs\StoreManagement\Models;

class Inventory
{
    public static function get_by_user_id($user_id)
    {
        global $connection;
        $sql = "SELECT * FROM inventory_settings WHERE user_id = ?";
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
    
}
