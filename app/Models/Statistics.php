<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use Pixelabs\StoreManagement\Models\Base;

class Statistics
{
    public static function get_products_stats($configuration, $filters = []) {
        
        $consumer_key = $configuration["consumer_key"];
        $consumer_secret = $configuration["consumer_secret"];
        $store_url = $configuration["store_url"];
        $client = new Client();
        $dateRange = $filters ? self::getDateRange($filters) : [];
        try {
            // Fetch Products
            $productParams = [
                'auth' => [$consumer_key, $consumer_secret],
                'per_page' => 100
            ];
            if (!empty($dateRange)) {
                $productParams['query'] = [
                    'after' => $dateRange['after'],
                    'before' => $dateRange['before']
                ];
            }
            $response = $client->request('GET', $store_url . '/wp-json/wc/v3/products', $productParams);
        
            $products = json_decode($response->getBody(), true);
            $totalProducts = count($products);
            $normalProducts = 0;
            $saleProducts = 0;
        
            foreach ($products as $product) {
                if (isset($product['type']) && $product['type'] === 'simple') {
                    $normalProducts++;
                }
                if (isset($product['on_sale']) && $product['on_sale'] === true) {
                    $saleProducts++;
                }
            }
    
            // Fetch Orders
            $orderParams = [
                'auth' => [$consumer_key, $consumer_secret],
                'per_page' => 100
            ];
            if (!empty($dateRange)) {
                $orderParams['query'] = [
                    'after' => $dateRange['after'],
                    'before' => $dateRange['before']
                ];
            }
            $orderResponse = $client->request('GET', $store_url . '/wp-json/wc/v3/orders', $orderParams);
            $orders = json_decode($orderResponse->getBody(), true);
            $numberOfOrders = count($orders);
            $distinctProductsOnOrder = [];
    
            foreach ($orders as $order) {
                if (isset($order['line_items']) && is_array($order['line_items'])) {
                    foreach ($order['line_items'] as $item) {
                        $distinctProductsOnOrder[$item['product_id']] = true;  
                    }
                }
            }
        
            return [
                'totalProducts' => $totalProducts,
                'normalProducts' => $normalProducts,
                'saleProducts' => $saleProducts,
                'numberOfOrders' => $numberOfOrders,
                'totalDistinctProductsOnOrder' => count($distinctProductsOnOrder) 
            ];
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }


    public static function get_orders_stats($configuration, $filters = []) {
        
        $client = new Client();
        $dateRange = self::getDateRange($filters);
    
        try {
            $orderParams = ['auth' => [$configuration["consumer_key"], $configuration["consumer_secret"]],
            'per_page' => 100];
            if (!empty($dateRange)) {
                $orderParams['query'] = $dateRange;
            }
    
            $response = $client->request('GET', $configuration["store_url"] . '/wp-json/wc/v3/orders', $orderParams);
            $orders = json_decode($response->getBody(), true);
    
            // Calculating statistics
            $totalOrders = count($orders);
            $totalRevenue = 0;
            $totalItems = 0;
            $customers = [];
    
            foreach ($orders as $order) {
                $totalRevenue += $order['total'];  
                $totalItems += count($order['line_items']);  
                if (!in_array($order['customer_id'], $customers)) {
                    $customers[] = $order['customer_id'];  
                }
            }
    
            $orderAverage = $totalOrders > 0 ? round($totalRevenue / $totalOrders) : 0;
            $averageItems = $totalOrders > 0 ? round($totalItems / $totalOrders) : 0;
            $totalCustomers = count($customers);
    
            return [
                'totalOrders' => $totalOrders,
                'totalRevenue' => $totalRevenue,
                'orderAverage' => $orderAverage,
                'averageItems' => $averageItems,
                'totalCustomers' => $totalCustomers
            ];
        } catch (\Exception $e) {
            echo 'Error fetching orders: ' . $e->getMessage();
            return [];
        }
    }


    public static function get_revenue_stats($configuration, $filters = []) {
        
        $client = new Client();
        $dateRange = self::getDateRange($filters);
    
        try {
            $orderParams = [
                'auth' => [$configuration["consumer_key"], $configuration["consumer_secret"]],
                'per_page' => 100
            ];
            if (!empty($dateRange)) {
                $orderParams['query'] = $dateRange;
            }
    
            $response = $client->request('GET', $configuration["store_url"] . '/wp-json/wc/v3/orders', $orderParams);
            $orders = json_decode($response->getBody(), true);
    
            $totalOrders = count($orders);
            $totalRevenue = 0;
            $totalShipments = 0;
            $totalrehearsals = 0;
            foreach ($orders as $order) {
                $totalRevenue += $order['total'];
                $totalShipments += $order['shipping_total']; 

                if($order['status'] == "cancelled"){
                    $totalrehearsals += $order['total'];
                }
            }
    
            $orderAverage = $totalOrders > 0 ? round($totalRevenue / $totalOrders) : 0;
            $totalcuttings = $totalShipments + $totalrehearsals;
            $netIncome = $totalRevenue - $totalcuttings;
    
            return [
                'totalRevenue' => $totalRevenue,
                'totalrehearsals' => $totalrehearsals,
                'orderAverage' => $orderAverage,
                'totalShipments' => $totalShipments,
                'netIncome' => $netIncome
            ];
        } catch (\Exception $e) {
            echo 'Error fetching orders: ' . $e->getMessage();
            return [];
        }
    }
    
    
    public static function get_overview_stats($configuration, $filters = [])
    {
        $dateRange = self::getDateRange($filters);
        try
        {
            $params = [
                'auth' => [$configuration["consumer_key"], $configuration["consumer_secret"]],
                'per_page' => 100
            ];
            if (!empty($dateRange)) {
                $params['query'] = $dateRange;
            }


            $total_products = Base::get_number_of_products($configuration["store_url"], $params);
            $total_orders = Base::get_number_of_orders($configuration["store_url"], $params);
            $total_revenue = Base::get_total_revenue($configuration["store_url"], $params);
            $new_customers_count = Base::get_new_customers_count($configuration["store_url"], $params);
            $returning_customers_count = Base::get_returning_customers_count($configuration["store_url"], $params);

            return [
                'totalProducts' => $total_products,
                'totalOrders' => $total_orders,
                'totalRevenue' => $total_revenue,
                'newCustomers' => $new_customers_count,
                'returningCustomers' => $returning_customers_count
            ];
        }
        catch (\Exception $e) 
        {
            echo 'Error fetching orders: ' . $e->getMessage();
            return [];
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