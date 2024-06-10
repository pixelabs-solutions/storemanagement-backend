<?php

namespace Pixelabs\StoreManagement\Helpers;

class FileHelper
{
    public static function save_file($base64, $file_name)
    {
        if($base64 === null || $base64 === "") return "";
        if (preg_match('/^data:image\/(\w+);base64,/', $base64, $type)) {
            $extension = $type[1];
            $base64_string = substr($base64, strpos($base64, ',') + 1);
            $base64_string = str_replace(' ', '+', $base64_string);
        } 
        else {
            throw new \Exception('Invalid image data');
        }
        $binary_data = base64_decode($base64_string);
        $filepathURI = $file_name . time() . "." . $extension;
        $file_path = BASE_DIR . "/uploads/" . $filepathURI;
        
        $directory = dirname($file_path);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        file_put_contents($file_path, $binary_data);
        
        $url = "https://woo-management.com/". "public/uploads/" .$filepathURI;
        return $url;
    }
}