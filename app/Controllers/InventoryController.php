<?php 

namespace Pixelabs\StoreManagement\Controllers;
use Pixelabs\StoreManagement\Models\Inventory;

use Pixelabs\StoreManagement\Models\Base;


class InventoryController
{

    public function index()
    {
        $result = Inventory::get();
        echo $result;
        //include_once __DIR__ . '/../Views/inventory/settings.php';
    }

    public function add()
    {
        $result = $this->prepare_data("POST");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }

        $data = $result["data"];
        $result = Inventory::add($data);

        echo $result;
    }

    public function update()
    {
        $result = $this->prepare_data("PUT");
        if(!$result["is_data_prepared"])
        {
            echo $result["message"];
            return;
        }

        $data = $result["data"];
        $result = Inventory::update($data);

        echo $result;
    }

    public function prepare_data($request_type)
    {
        if ($_SERVER['REQUEST_METHOD'] !== $request_type) {
            http_response_code(405);
            return [
                "message" => "Invalid request type. Only PUT method is accepted.",
                "is_data_prepared" => false
            ];
        }

        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);
        if (is_null($data)) {
            echo "Invalid JSON data.";
            return [
                "message" => "Invalid JSON data.",
                "is_data_prepared" => false
            ];
        }
        return [ 
            "is_data_prepared" => true,
            "data" => $data
        ];
    }
}