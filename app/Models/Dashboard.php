<?php
namespace Pixelabs\StoreManagement\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Pixelabs\StoreManagement\Models\Configuration;
use Pixelabs\StoreManagement\Models\Base;

class Dashboard
{

    public static function get_dashboard_stats($filters = [])
    {
        $response = json_decode(Configuration::getConfiguration(), true);
        if ($response['status_code'] != 200) {
            echo $response["message"];
            return [];
        }
    
        $data = $response['data'];
        $dateRange = self::getDateRange($filters);
        try
        {
            $params = ['auth' => [$data["consumer_key"], $data["consumer_secret"]]];
            if (!empty($dateRange)) {
                $params['query'] = $dateRange;
            }

            $products = Base::get_number_of_products($data["store_url"], $params);
            $new_customers_count = Base::get_new_customers_count($data["store_url"], $params);
            $total_transactions = Base::get_total_revenue($data["store_url"], $params);

            return [
                'new_products' => $products,
                'new_customers' => $new_customers_count,
                'total_transactions' => $total_transactions
            ];
        }
        catch (\Exception $e) 
        {
            echo 'Error fetching dashboard statistics: ' . $e->getMessage();
            return [];
        }
    } 


    public static function get_dashboard_data()
    {
        $response = json_decode(Configuration::getConfiguration(), true);
        if ($response['status_code'] != 200) {
            echo $response["message"];
            return [];
        }
    
        $data = $response['data'];
        $cities = [];
        $total_customers = 0;
        $latestOrders = [];
        $client = new Client();
        try
        {
            $response = $client->request('GET', $data["store_url"] . '/wp-json/wc/v3/orders', [
                'auth' => [$data["consumer_key"], $data["consumer_secret"]]  
            ]);
    
            $orders = json_decode($response->getBody(), true);
            foreach ($orders as $order) {
                $city = $order['shipping']['city'] ?? '';
                $city = trim($city);
                if (empty($city)) {
                    $city = 'Unknown City';
                }
                if (!isset($cities[$city])) {
                    $cities[$city] = ['customer_ids' => []];
                }
                if (!array_key_exists($order['customer_id'], $cities[$city]['customer_ids'])) {
                    $cities[$city]['customer_ids'][$order['customer_id']] = true;
                    $total_customers++;
                }

                $latestOrders[] = [
                    'order_id' => $order['id'],
                    'sum' => $order['total'],
                    'date' => $order['date_created'],
                    'client' => $order['billing']['first_name'] . ' ' . $order['billing']['last_name']
                ];
                if (count($latestOrders) > 3) {
                    array_shift($latestOrders);
                }
            }
            $cityData = [];
            foreach ($cities as $city => $data) {
                $customer_count = count($data['customer_ids']);
                $percentage = $total_customers > 0 ? ($customer_count / $total_customers * 100) : 0;
                $cityData[$city] = $percentage;
            }
            arsort($cityData);
            $topCities = array_slice($cityData, 0, 5, true);

            // Prepare output format
            $formattedCities = [];
            foreach ($topCities as $city => $percentage) {
                $formattedCities[] = [
                    'city' => $city,
                    'percentage_of_customers' => number_format($percentage, 2) . '%'
                ];
            }

            return [
                'customers_location' => $formattedCities,
                'latest_orders' => $latestOrders
            ];
        }
        catch (\GuzzleHttp\Exception\RequestException $e) {
            return 'Error fetching orders: ' . $e->getMessage();
        }
    }


    public static function fetchTopSellingProductImages() 
    {
        $response = json_decode(Configuration::getConfiguration(), true);
        if ($response['status_code'] != 200) {
            echo $response["message"];
            return [];
        }
    
        $data = $response['data'];
        $client = new Client();
        $productSales = [];
    
        try {
            $response = $client->request('GET', $data["store_url"] . '/wp-json/wc/v3/orders', [
                'auth' => [$data["consumer_key"], $data["consumer_secret"]]
            ]);
            $orders = json_decode($response->getBody(), true);
    
            foreach ($orders as $order) {
                foreach ($order['line_items'] as $item) {
                    $productId = $item['product_id'];
                    if (!isset($productSales[$productId])) {
                        $productSales[$productId] = 0;
                    }
                    $productSales[$productId] += $item['total'];
                }
            }
    
            arsort($productSales);  
            $topProductIds = array_slice(array_keys($productSales), 0, 3);
    
            $topProducts = [];
            foreach ($topProductIds as $productId) {
                $prodResponse = $client->request('GET', $data["store_url"] . "/wp-json/wc/v3/products/$productId", [
                    'auth' => [$data["consumer_key"], $data["consumer_secret"]]
                ]);
                $productDetails = json_decode($prodResponse->getBody(), true);
                if (isset($productDetails['images']) && count($productDetails['images']) > 0) {
                    $topProducts[] = [
                        'product_name' => $productDetails['name'],
                        'image_url' => $productDetails['images'][0]['src']
                    ];
                } else {
                    $topProducts[] = [
                        'product_name' => $productDetails['name'],
                        'image_url' => 'No image available'
                    ];
                }
            }
    
            return $topProducts;
        } 
        catch (\GuzzleHttp\Exception\RequestException $e) {
            return 'Error fetching product data: ' . $e->getMessage();
        }
    }
    

    public static function getDateRange($filters) {

        if (isset($filters['date_from']) && $filters['date_from'] !== "" && 
            isset($filters['date_to']) && $filters['date_to'] !== "") {
            return [
                    'after' => (new \DateTime($filters['date_from']))->format('Y-m-d') . 'T00:00:00',
                    'before' => (new \DateTime($filters['date_to']))->format('Y-m-d') . 'T23:59:59'
                ];
        }
        
        if (isset($filters['query'])) {
            $start = new \DateTime();
            $end = new \DateTime();
            switch ($filters['query']) {
                case 'last_week':
                    $start->modify('last monday -7 days');
                    $end->modify('last sunday');
                    break;
                case 'current_month':
                    $start->modify('first day of this month');
                    $end->modify('last day of this month');
                    break;
                case 'last_year':
                    $start->modify('first day of January last year');
                    $end->modify('last day of December last year');
                    break;
                case '24_hours':
                    $start->modify('-24 hours');
                    $end = new \DateTime(); 
                    break;
                default:
                    return null;
            }
    
            return [
                'after' => $start->format('Y-m-d') . 'T00:00:00',
                'before' => $end->format('Y-m-d') . 'T23:59:59'
            ];
        }
        return null;
    }
}