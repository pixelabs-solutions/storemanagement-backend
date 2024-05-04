<?php

namespace Pixelabs\StoreManagement\Helpers;

class HttpRequestHelper
{
    public static function validate_request($request_type)
    {
        if ($_SERVER['REQUEST_METHOD'] !== $request_type) {
            http_response_code(405);
            return [
                "message" => "Invalid request type. Only ".$request_type." method is accepted.",
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