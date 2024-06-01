<?php

namespace Pixelabs\StoreManagement\Helpers;

class FileHelper
{
    public static function save_file($base64, $file_name)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $base64, $type)) {
            $extension = $type[1];
            $base64_string = substr($base64, strpos($base64, ',') + 1);
            $base64_string = str_replace(' ', '+', $base64_string);
        } 
        else {
            throw new \Exception('Invalid image data');
        }
        $binary_data = base64_decode($base64_string);
        $file_path = BASE_DIR . "/uploads/" . $file_name . time() . "." . $extension;
        
        $directory = dirname($file_path);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        file_put_contents($file_path, $binary_data);
        return "https://www.pngitem.com/pimgs/m/20-202503_animated-3d-icon-3d-animated-icons-hd-png.png";
    }
}