<?php
namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class Category
{
    public static function store_category($category)
    {
        global $connection; // Assuming $connection is your MySQLi connection object

        try {
            $stmt = $connection->prepare("
                INSERT INTO categories (id, name, parent, image, count)
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                    name = VALUES(name),
                    parent = VALUES(parent),
                    image = VALUES(image),
                    count = VALUES(count)
            ");

            $id = $category['id'];
            $name = $category['name'];
            $parent = $category['parent'];
            $image = json_encode($category['image']);
            $count = $category['count'];

            $stmt->bind_param(
                'isiss',
                $id,
                $name,
                $parent,
                $image,
                $count
            );

            $stmt->execute();
            $stmt->close();

        }
        catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }
    }

    public static function get_all_categories()
    {
        global $connection;
        $products = [];

        try {
            $query = "SELECT * FROM categories";
            $result = $connection->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $row['image'] = json_decode($row['image'], true);
                    $categories[] = $row;
                }
                $result->free();
            } else {
                echo "Error executing query: " . $connection->error . "\n";
            }
        } catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }

        return $categories;
    }

    public static function delete_all_categories()
    {
        global $connection;
        try{
            $query = "DELETE FROM categories";
            $connection->query($query);
        }
        catch (\mysqli_sql_exception $e) {
            echo "Database error: " . $e->getMessage() . "\n";
        }
    }



    public static function get_categories($configuration, $endpoint, $fields = [])
    {
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();
        $all_categories = [];
        $page = 1;

        try 
        {
            while (true) 
            {
                $response = $client->request('GET', $store_url . '/wp-json/wc/v3/'.$endpoint, [
                    'auth' => [$consumer_key, $consumer_secret],
                    'query' => array_merge(['per_page' => 100, 'page' => $page], $fields)
                ]);
                
                $categories = json_decode($response->getBody(), true);
                if (empty($categories)) 
                {
                    break;
                }
                
                $all_categories = array_merge($all_categories, $categories);
                $page++;
            }
            
            return $all_categories;
        } 
        catch (RequestException $e) 
        {
            echo "Exception: ".$e->getMessage();
            return null;
        }
    }
}