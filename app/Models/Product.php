<?php

// app\Models\Product.php


namespace Pixelabs\StoreManagement\Models;
// require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class Product
{

    // public static function get_products($configuration)
    // {
    //     $consumer_key = $configuration["consumer_key"];
    //     $consumer_secret = $configuration["consumer_secret"];
    //     $store_url = $configuration["store_url"];

    //     $client = new Client();
    //     try {
    //         $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products', [
    //             'auth' => [$consumer_key, $consumer_secret]
    //         ]);
        
    //         return json_decode($response->getBody(), true);
    //     } catch (RequestException $e) {
    //         echo $e->getMessage();
    //     }
    // }

    public static function get_products($configuration, $endpoint, $fields = [])
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();
        $all_products = [];
        $page = 1;

        try 
        {
            while (true) 
            {
                $response = $client->request('GET', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                    'auth' => [$consumer_key, $consumer_secret],
                    'query' => array_merge(['per_page' => 100, 'page' => $page], $fields)
                ]);
                
                $products = json_decode($response->getBody(), true);
                if (empty($products)) 
                {
                    break;
                }
                
                $all_products = array_merge($all_products, $products);
                $page++;
            }
            
            return $all_products;
        } 
        catch (RequestException $e) 
        {
            echo "Exception: ".$e->getMessage();
            return null;
        }
    }

    // public static function get_product_by_id($configuration, $id)
    // {
    //     $consumer_key = $configuration["consumer_key"];
    //     $consumer_secret = $configuration["consumer_secret"];
    //     $store_url = $configuration["store_url"];
    //     $client = new Client();
    //     try 
    //     {
    //         $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products/'.$id, [
    //             'auth' => [$consumer_key, $consumer_secret]
    //         ]);
        
    //         $product = json_decode($response->getBody(), true);
    //         // if($product['status'] !== 'publish')
    //         // {
    //         //     return null;
    //         // }
    //         return $product;
    //     } 
    //     catch (RequestException $e) 
    //     {
    //         echo $e->getMessage();
    //     }
    // }


    // public static function get_variation_by_id($configuration, $id, $var_id)
    // {
    //     $consumer_key = $configuration["consumer_key"];
    //     $consumer_secret = $configuration["consumer_secret"];
    //     $store_url = $configuration["store_url"];
    //     $client = new Client();
    //     try 
    //     {
    //         $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products/'.$id.'/variations/'.$var_id, [
    //             'auth' => [$consumer_key, $consumer_secret]
    //         ]);
        
    //         $product_variation = json_decode($response->getBody(), true);
    //         // if($product['status'] !== 'publish')
    //         // {
    //         //     return null;
    //         // }
    //         return $product_variation;
    //     } 
    //     catch (RequestException $e) 
    //     {
    //         echo $e->getMessage();
    //     }
    // }



    public static function delete($configuration, $id)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];

        $client = new Client();
        try 
        {
            $response = $client->request('DELETE', $store_url . '/wp-json/wc/v3/products/'.$id, [
                'auth' => [$consumer_key, $consumer_secret]
            ]);

            if($response->getStatusCode() == 200)
            {
                return json_decode($response->getBody(), true);
            }
            return null;
        
        } 
        catch (RequestException $e) 
        {
            echo $e->getMessage();
            return null;
        }
    }
    


    public static function add($configuration, $data)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];

        $payload = json_encode([
            'name' => $data['name'], 
            'type' => $data['type'],
            'description' => $data['description'], 
            'manage_stock' => true,
            'stock_quantity' => $data['stock_quantity'], 
            'categories' => array_map(function($category_id) {
                return ['id' => $category_id]; 
            }, $data['categories']),
            'images' => array_map(function($image_url) {
                return ['src' => $image_url]; 
            }, $data['images']),
            'regular_price' => $data['regular_price'],
            'sale_price' => $data['sale_price'],
            'status' => 'publish'
        ]);

        $client = new Client();
        try
        {
            $response = $client->request('POST', $store_url . '/wp-json/wc/v3/products', [
                'auth' => [$consumer_key, $consumer_secret],
                'body' => $payload
            ]);

            var_dump($response);

            // var_dump($response->getBody());
            if ($response->getStatusCode() == 201) 
            {
                return ['success' => 'true', 'status_code' => $response->getStatusCode()];
            } 
            else 
            {
                return ['success' => 'false', 'status_code' => $response->getStatusCode()];
            }
        }
        catch(RequestException $exception)
        {
            error_log($exception->getMessage());
            return null;
        }
    }

    public static function createProductVariation($configuration, $productId, $variationData)
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();

        $response = $client->request('POST', $store_url . '/wp-json/wc/v3/products/'.$productId.'/variations', [
            'auth' => [$consumer_key, $consumer_secret],
            'body' => json_encode($variationData)
        ]);

        if ($response->getStatusCode() == 201) 
        {
            return ['success' => 'true', 'status_code' => $response->getStatusCode()];
        } 
        else 
        {
            return ['success' => 'false', 'status_code' => $response->getStatusCode()];
        }
    }


    public static function get_products_count($configuration)
    {
        $client = new Client();
        $params = [
            'auth' => [$configuration["consumer_key"], $configuration["consumer_secret"]],
            'query' => [
                'per_page' => 100,
                'page' => 1
            ]
        ];

        $total_products = 0;

        while (true) {
            $response = $client->request('GET', $configuration["store_url"] . '/wp-json/wc/v3/products', $params);
            $products = json_decode($response->getBody(), true);

            $products_count = count($products);

            if ($products_count == 0) {
                break;
            }

            $total_products += $products_count;
            $params['query']['page'] += 1;
        }

        return $total_products;
    }

    public static function store_products($products, $user_id)
    {
        global $connection;
        try {
            foreach ($products as $product) {
                $stmt = $connection->prepare("
                    INSERT INTO products (id, user_id, name, images, categories, regular_price, sale_price, stock_quantity, description, type, attributes, variations, date_created)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ");
                $id = $product['id'];
                $name = $product['name'];
                $images = json_encode($product['images']);
                $categories = json_encode($product['categories']);
                $attributes = json_encode($product['attributes']);
                $variations = json_encode($product['variations']);
                $regular_price = $product['regular_price'] ?: null;
                $sale_price = $product['sale_price'] ?: null;
                $stock_quantity = $product['stock_quantity'];
                $description = $product['description'];
                $type = $product['type'];
                $date_created = $product['date_created'];

                $stmt->bind_param(
                    'iissssdisssss',
                    $id,
                    $user_id,
                    $name,
                    $images,
                    $categories,
                    $regular_price,
                    $sale_price,
                    $stock_quantity,
                    $description,
                    $type,
                    $attributes,
                    $variations, 
                    $date_created
                );

                $stmt->execute();
                $stmt->close();
            }
            
        } catch (\mysqli_sql_exception $e) {
            echo "store_products() Database error: " . $e->getMessage() . "\n";
        }
    }

    public static function get_all_products($user_id)
    {
        global $connection;
        $products = [];

        try {
            $query = "SELECT * FROM products WHERE user_id = $user_id";
            $result = $connection->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $row['images'] = json_decode($row['images'], true);
                    $row['categories'] = json_decode($row['categories'], true);
                    $row['attributes'] = json_decode($row['attributes'], true);
                    $row['variations'] = json_decode($row['variations'], true);
                    $products[] = $row;
                }
                $result->free();
            } else {
                echo "Error executing query: " . $connection->error . "\n";
            }
        } catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }

        return $products;
    }

    public static function get_product_by_id($product_id)
    {
        global $connection;
        $product = null; // Initialize a variable to hold the product data

        try {
            // Prepare the SQL statement
            $stmt = $connection->prepare("SELECT * FROM products WHERE id = ?");
            if ($stmt === false) {
                throw new \mysqli_sql_exception("Unable to prepare statement: " . $connection->error);
            }

            // Bind the parameter to the statement
            $stmt->bind_param("i", $product_id);

            // Execute the statement
            if ($stmt->execute()) {
                // Get the result set from the executed statement
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    // Fetch the product record
                    $row = $result->fetch_assoc();
                    $row['images'] = json_decode($row['images'], true);
                    $row['categories'] = json_decode($row['categories'], true);
                    $row['attributes'] = json_decode($row['attributes'], true);
                    $row['variations'] = json_decode($row['variations'], true);
                    $product = $row;
                } else {
                    echo "No product found with the given ID.\n";
                }
                $result->free();
            } else {
                echo "Error executing query: " . $stmt->error . "\n";
            }
            $stmt->close();
        } catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }

        return $product;
    }
    public static function delete_all_products()
    {
        global $connection;
        try{
            $query = "DELETE FROM products";
            $connection->query($query);
        }
        catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }
    }
}
