<?php

// app\Controllers\ProductController.php

namespace Pixelabs\StoreManagement\Controllers;

use Pixelabs\StoreManagement\Models\Product;
use Pixelabs\StoreManagement\Models\Base;
use Pixelabs\StoreManagement\Helpers\HttpRequestHelper;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Helpers\FileHelper;
use Pixelabs\StoreManagement\Models\Authentication;
use Pixelabs\StoreManagement\Models\Category;
use Pixelabs\StoreManagement\Models\Attribute;
use Pixelabs\StoreManagement\Models\Currency;
use Pixelabs\StoreManagement\Models\Synchronize;

class ProductController
{
    private $table_name = 'products';
    public function index()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $user_id = Authentication::getUserIdFromToken();
        if($user_id === null)
        {
            if ($is_rest == 'true') {
                http_response_code(401);
                echo json_encode(array(
                    "message" => "User not authenticated",
                    "status_code" => 401
                ));
                exit;
            }
            else{
                header('Location: /authentication/login');
            }
        }
        


        $user_level = Authentication::getUserLevelFromToken();
        if ($user_level == ADMIN) {
            header("Location: /admin/index");
            } else {
        
        // $products = Base::wc_get($configuration, $this->table_name, $page, $product_fields);
        $products = Product::get_all_products($user_id);
        if (isset($_GET['category']) && $_GET['category'] !== "") {
            $category = $_GET['category'];
            $filteredProducts = [];
            foreach ($products as $product) {
                $categories = $product['categories'];
                $categorySlugs = array_column($categories, 'id');
                if (in_array($category, $categorySlugs)) {
                    $filteredProducts[] = $product;
                }
            }
            $products = $filteredProducts;
        }

        if (
            isset($_GET['inventory_from']) && $_GET['inventory_from'] !== "" &&
            isset($_GET['inventory_to']) && $_GET['inventory_to'] !== ""
        ) {
            $inventory_from = intval($_GET['inventory_from']);
            $inventory_to = intval($_GET['inventory_to']);
            $filteredProducts = [];
            foreach ($products as $product) {
                if (isset($product['stock_quantity']) && is_numeric($product['stock_quantity'])) {
                    $stock_quantity = intval($product['stock_quantity']);
                    if ($stock_quantity >= $inventory_from && $stock_quantity <= $inventory_to) {
                        $filteredProducts[] = $product;
                    }
                }
            }
            $products = $filteredProducts;
        }
        $categories = Category::get_all_categories($user_id);
        $attributes = Attribute::get_all_attributes($user_id);
        $currency = Currency::get_current_currency($user_id);

        $number_of_products = count($products);
        if ($is_rest == 'true') {
            $data = [
                'products' => $products,
                'categories' => $categories,
                'attributes' => $attributes,
                'currency' => $currency,
                'number_of_products' => $number_of_products
            ];
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        } else {
            include_once __DIR__ . '/../Views/product/index.php';
        }
    }
    }

    public function product_by_id($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';

        $product = Product::get_product_by_id($id);

        echo json_encode($product);
    }


    public function variation_by_id($id, $var_id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        // if(isset($_GET['term_id'])){
        //     $term_id = $_GET['term_id'];

        // }
        $variations_by_id = Base::wc_get_by_id($configuration, $this->table_name."/".$id."/"."variations"."/".$var_id);

        echo $variations_by_id;
    }
    public function variations($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        // if(isset($_GET['term_id'])){
        //     $term_id = $_GET['term_id'];

        // }
        $variations = Base::wc_get_by_id($configuration, $this->table_name."/".$id."/"."variations");

        echo $variations;
    }
    
    public function delete($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $result = Base::wc_delete_by_id($configuration, $this->table_name . "/" . $id);
        Synchronize::sync_products();

        echo $result;
    }

    public function add()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $result = HttpRequestHelper::validate_request("POST");
        if (!$result["is_data_prepared"]) {
            echo $result["message"];
            return;
        }
        $data = $result["data"];

        $image_paths = [];
        if (is_array($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $filename = "products/" . $data['name'] . "_" . $key;
                $image_paths[] = FileHelper::save_file($image, $filename);
            }
        } else {
            $image_paths[] = FileHelper::save_file($data['images'], "products/" . $data['name']);
        }

        $payload = [
            'name' => $data['name'],
            'type' => $data['type'],
            'description' => $data['description'],
            'categories' => !empty($data['categories']) ? array_map(function ($category_id) {
                return ['id' => $category_id];
            }, $data['categories']) : [],
            'images' => !empty($image_paths) ? array_map(function ($image_url) {
                return ['src' => $image_url];
            }, $image_paths) : []
        ];
        // echo json_encode($payload);exit;
        if ($data['type'] === "variable") {
            // Construct attributes array
            // $attributes = [];
            // foreach ($data['attributes_names'] as $index => $name) {
            //     $attribute = [
            //         'name' => $name,
            //         'options' => $data['attributes_options'][$index],
            //         'variation' => true
            //     ];
            //     $attributes[] = $attribute;
            // }
            // $payload['attributes'] = $attributes;

            // $variations = $this->generateVariations($data['attributes_options'], $data['attributes_names'], $data['regular_price']);

            // $payload['variations'] = $variations;
            // echo json_encode($payload);exit;

            $payload['attributes'] = $data['attributes'];
            $payload['variations'] = $data['variations'];
            // echo json_encode($payload);exit;
            $response = Base::wc_add($configuration, $this->table_name, json_encode($payload));
            if ($is_rest == 'true') {
                echo $response;
            }
            $result = json_decode($response, true);
            $product_id = $result['data_id'];
            foreach ($payload['variations'] as $variation) {
                Product::createProductVariation($configuration, $product_id, $variation);
            }
            Synchronize::sync_products();

        } else {
            $payload['manage_stock'] = true;
            $payload['stock_quantity'] = $data['stock_quantity'];
            $payload['regular_price'] = $data['regular_price'];
            $payload['sale_price'] = $data['sale_price'];
            
            // echo json_encode($payload);exit;

            $response = Base::wc_add($configuration, $this->table_name, json_encode($payload));
            if ($is_rest == 'true') {
                echo $response;
            }

            Synchronize::sync_products();

        }
    }


    private function generateVariations($options, $names, $regularPrice, $index = 0, $currentAttributes = [], &$variations = [])
    {
        $currentOptions = $options[$index];
        foreach ($currentOptions as $option) {
            $currentAttributes[$names[$index]] = $option;
            if ($index === count($options) - 1) {
                $variation = [
                    'regular_price' => $regularPrice,
                    'attributes' => array_map(function ($name, $option) {
                        return ['name' => ucfirst($name), 'option' => $option];
                    }, array_keys($currentAttributes), $currentAttributes)
                ];
                $variations[] = $variation;
            } else {
                $this->generateVariations($options, $names, $regularPrice, $index + 1, $currentAttributes, $variations);
            }
        }
        return $variations;
    }

    public function update($id)
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        $result = HttpRequestHelper::validate_request("PUT");
        if (!$result["is_data_prepared"]) {
            echo $result["message"];
            return;
        }

        $data = $result["data"];

        $image_paths = [];
        if (is_array($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $filename = "products/" . $data['name'] . "_" . $key;
                $image_paths[] = FileHelper::save_file($image, $filename);
            }
        } else {
            $image_paths[] = FileHelper::save_file($data['images'], "products/" . $data['name']);
        }


        $payload = [
            'name' => $data['name'],
            'type' => $data['type'],
            'description' => $data['description']
        ];
        if(!empty($data['categories'])){
            $payload['categories'] = array_map(function ($category_id) {
                return ['id' => $category_id];
            }, $data['categories']);
        }
        
        if(!empty($data['images']) && !empty($image_paths)){
            $payload['images'] = array_map(function ($image_url) {
                return ['src' => $image_url];
            }, $image_paths);
        }
        

        if ($data['type'] === "variable") {
            // Construct attributes array
            // $attributes = [];
            // foreach ($data['attributes_names'] as $index => $name) {
            //     $attribute = [
            //         'name' => $name,
            //         'options' => $data['attributes_options'][$index],
            //         'variation' => true
            //     ];
            //     $attributes[] = $attribute;
            // }
            // $payload['attributes'] = $attributes;

            // $variations = $this->generateVariations($data['attributes_options'], $data['attributes_names'], $data['regular_price']);
            // $payload['variations'] = $variations;
            $payload['attributes'] = $data['attributes'];
            $payload['variations'] = $data['variations'];
            $response = Base::wc_update($configuration, $this->table_name . "/" . $id, $payload);

            foreach ($payload['variations'] as $variation) {
                Product::createProductVariation($configuration, $id, $variation); // Update variations
            }

            Synchronize::sync_products();

        } else {
            $payload['manage_stock'] = true;
            $payload['stock_quantity'] = $data['stock_quantity'];
            $payload['regular_price'] = $data['regular_price'];
            $payload['sale_price'] = $data['sale_price'];
            $response = Base::wc_update($configuration, $this->table_name . "/" . $id, json_encode($payload));
            Synchronize::sync_products();

        }
        if ($is_rest == 'true') {
            echo $response;
        }
    }

    public function export()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);

        // $product_fields = 
        // [
        //     '_fields' => 'id, name, images, categories, regular_price, sale_price, stock_quantity, description, type, attributes, variations'
        // ];
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $products = Product::get_products($configuration, $this->table_name);
        // echo json_encode($products);exit;
        $csv_file_path = 'products.csv';

        // Open a file handle for writing
        $fp = fopen($csv_file_path, 'w');
        fputs($fp, $bom = chr(0xEF) . chr(0xBB) . chr(0xBF));
        // Write headers
        $headers = [
            'ID', 'Name', 'Categories', 'Regular Price', 'Sale Price', 'Stock Quantity', 'Description', 'Type', 'Attributes',
            'Variations', 'Slug', 'Permalink', 'Date Created', 'Date Modified', 'Status', 'Featured', 'Catalog Visibility',
            'Short Description', 'SKU', 'Price', 'Date On Sale From', 'Date On Sale To', 'On Sale', 'Purchasable',
            'Total Sales', 'Virtual', 'Downloadable', 'Downloads', 'External URL', 'Button Text', 'Tax Status', 'Tax Class',
            'Manage Stock', 'Backorders', 'Backorders Allowed', 'Backordered', 'Low Stock Amount', 'Sold Individually',
            'Weight', 'Dimensions', 'Shipping Required', 'Shipping Taxable', 'Shipping Class', 'Reviews Allowed',
            'Average Rating', 'Rating Count', 'Upsell IDs', 'Cross Sell IDs', 'Parent ID', 'Purchase Note', 'Tags',
            'Default Attributes', 'Grouped Products', 'Menu Order', 'Price HTML', 'Related IDs', 'Meta Data', 'Stock Status',
            'Has Options', 'Post Password'
        ];
        fputcsv($fp, $headers);

        // Write data
        foreach ($products as $product) {
            $product_data = [
                $product['id'],
                $product['name'],
                implode(', ', array_column($product['categories'], 'name')),
                $product['regular_price'],
                $product['sale_price'],
                $product['stock_quantity'],
                strip_tags($product['description']),
                $product['type'],
                json_encode($product['attributes']),
                json_encode($product['variations']),
                $product['slug'],
                $product['permalink'],
                $product['date_created'],
                $product['date_modified'],
                $product['status'],
                $product['featured'],
                $product['catalog_visibility'],
                strip_tags($product['short_description']),
                $product['sku'],
                $product['price'],
                $product['date_on_sale_from'],
                $product['date_on_sale_to'],
                $product['on_sale'],
                $product['purchasable'],
                $product['total_sales'],
                $product['virtual'],
                $product['downloadable'],
                json_encode($product['downloads']),
                $product['external_url'],
                $product['button_text'],
                $product['tax_status'],
                $product['tax_class'],
                $product['manage_stock'],
                $product['backorders'],
                $product['backorders_allowed'],
                $product['backordered'],
                $product['low_stock_amount'],
                $product['sold_individually'],
                $product['weight'],
                json_encode($product['dimensions']),
                $product['shipping_required'],
                $product['shipping_taxable'],
                $product['shipping_class'],
                $product['reviews_allowed'],
                $product['average_rating'],
                $product['rating_count'],
                json_encode($product['upsell_ids']),
                json_encode($product['cross_sell_ids']),
                $product['parent_id'],
                $product['purchase_note'],
                json_encode($product['tags']),
                json_encode($product['default_attributes']),
                json_encode($product['grouped_products']),
                $product['menu_order'],
                $product['price_html'],
                json_encode($product['related_ids']),
                json_encode($product['meta_data']),
                $product['stock_status'],
                $product['has_options'],
                $product['post_password']
            ];
            fputcsv($fp, $product_data);
        }

        // Close the file handle
        fclose($fp);

        // Set headers to prompt a download of the CSV file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . basename($csv_file_path) . '"');
        header('Content-Length: ' . filesize($csv_file_path));
        readfile($csv_file_path);

        // Optionally delete the file after download
        unlink($csv_file_path);

        exit;
    }


    public function import()
    {
        $is_rest = isset($_GET['is_rest']) ? 'true' : 'false';
        $configuration = $this->prepare_configuration($is_rest);
        // Check if the file is uploaded
        if (!isset($_FILES['csv_file'])) {
            echo json_encode(['error' => 'No file uploaded'], 400);
        }

        $file = $_FILES['csv_file']['tmp_name'];
        $data = array_map('str_getcsv', file($file));
        $header = array_shift($data);

        $products = [];

        foreach ($data as $row) {
            $row = array_combine($header, $row);

            $categories = array_map(function ($category_id) {
                return ['id' => (int) $category_id];
            }, explode(',', $row['category']));

            $images = array_map(function ($image_url) {
                return ['src' => $image_url];
            }, explode(',', $row['images']));

            $products[] = [
                'name' => $row['name'],
                'type' => $row['type'],
                'description' => $row['description'],
                'manage_stock' => true,
                'stock_quantity' => (int) $row['stock_quantity'],
                'categories' => $categories,
                'images' => $images,
                'regular_price' => $row['regular_price'],
                'sale_price' => $row['sale_price']
            ];
            // $payload = [
            //     'name' => $row['name'],
            //     'type' => $row['type'],
            //     'description' => $row['description'],
            //     'manage_stock' => true,
            //     'stock_quantity' => (int) $row['stock_quantity'],
            //     'categories' => $categories,
            //     'images' => $images,
            //     'regular_price' => $row['regular_price'],
            //     'sale_price' => $row['sale_price']
            // ];
            // $response = Base::wc_add($configuration, $this->table_name, json_encode($payload));
            // echo $response;
        }

        $payload = ['create' => $products];
        // // echo json_encode($payload, JSON_PRETTY_PRINT);
        $response = Base::wc_batch($configuration, $this->table_name . "/batch", json_encode($payload));
        Synchronize::sync_products();

        echo $response;

        // Replace Base::wc_add and $configuration with your actual implementation details
        // $response = Base::wc_add($configuration, $this->table_name, json_encode($payload));

        // return response()->json(['success' => 'Products imported successfully', 'response' => $response], 200);
    }

    public function prepare_configuration($is_rest)
    {
        $response = Configuration::getConfiguration($is_rest);
        $result = json_decode($response, true);
        if ($is_rest && $result['status_code'] != 200) {
            echo $response;
            exit;
        }

        return $result['data'];
    }
}
