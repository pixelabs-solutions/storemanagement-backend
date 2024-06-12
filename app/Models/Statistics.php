<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use Pixelabs\StoreManagement\Models\Base;

class Statistics
{
    public static function get_products_stats($filters = []) 
    {
        global $connection;
        $date_range = $filters ? self::getDateRange($filters) : [];
        try {
            
            $user_id = Authentication::getUserIdFromToken();
            $totalProducts = Base::get_number_of_products($user_id, $date_range);
            
            
            // SQL query to count the number of rows in the products table
            $query = "SELECT *  FROM products WHERE user_id = $user_id";
            if ($date_range != null && !empty($date_range)) {
                $query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }

            $result = $connection->query($query);

            $normalProducts = 0;
            $saleProducts = 0;
        

            while ($product = $result->fetch_assoc()) {
                // echo json_encode($product);
                if (isset($product['type']) && $product['type'] === 'simple') {
                    $normalProducts++;
                }
                if (isset($product['on_sale']) && $product['on_sale'] === true) {
                    $saleProducts++;
                }
            }
    


            $query = "SELECT COUNT(*) AS transaction_count FROM transactions WHERE user_id = $user_id";
            if ($date_range != null && !empty($date_range)) {
                $query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
            $result = $connection->query($query);
            $row = $result->fetch_assoc();
     

            $numberOfOrders = $row['transaction_count'];
            $distinctProductsOnOrder = [];

            $order_query = "SELECT *  FROM transactions WHERE user_id = $user_id";
            if ($date_range != null && !empty($date_range)) {
                $order_query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
                
            $order_result = $connection->query($order_query);

            while ($order = $order_result->fetch_assoc()) {
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


    public static function get_orders_stats($filters = []) {
        global $connection;
        $date_range = $filters ? self::getDateRange($filters) : [];
    
        try {
            
            $user_id = Authentication::getUserIdFromToken();

            $query = "SELECT COUNT(*) AS transaction_count FROM transactions WHERE user_id = $user_id";
            if ($date_range != null && !empty($date_range)) {
                $query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
            
            $result = $connection->query($query);
            $row = $result->fetch_assoc();
 

         $totalOrders = $row['transaction_count'];

            $totalRevenue = 0;
            $totalItems = 0;
            $customers = [];
    

            $query = "SELECT *  FROM transactions WHERE user_id = $user_id";
            if ($date_range != null && !empty($date_range)) {
                $query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
            $result = $connection->query($query);

            while ($order = $result->fetch_assoc()) {
                $totalRevenue += $order['total'];  
                $totalItems += count(json_decode($order['line_items']));  
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


    public static function get_revenue_stats($filters = []) {
        global $connection;
        $date_range = $filters ? self::getDateRange($filters) : [];
        try {
            $user_id = Authentication::getUserIdFromToken();    
            
            $order_total_query = "SELECT COUNT(*) AS transaction_count FROM transactions WHERE user_id = $user_id";
            if ($date_range != null && !empty($date_range)) {
                $order_total_query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
            $order_total_result = $connection->query($order_total_query);
            $order_total_row = $order_total_result->fetch_assoc();

            $totalOrders = $order_total_row['transaction_count'];

            // $totalOrders = count($orders);


            $query = "SELECT *  FROM transactions WHERE user_id = $user_id";
            if ($date_range != null && !empty($date_range)) {
                $query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
            $result = $connection->query($query);

            $totalRevenue = 0;
            $totalShipments = 0;
            $totalrehearsals = 0;
            while ($order = $result->fetch_assoc()) {
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
    
    
    public static function get_overview_stats($filters = [])
    {
        $date_range = $filters ? self::getDateRange($filters) : [];
        try
        {
            $user_id = Authentication::getUserIdFromToken();

            $total_products = Base::get_number_of_products($user_id, $date_range);
            $total_orders = Base::get_number_of_orders($user_id, $date_range);
            $total_revenue = Base::get_total_revenue($user_id, $date_range);
            $new_customers_count = Base::get_new_customers_count($user_id, $date_range);
            $returning_customers_count = Base::get_returning_customers_count($user_id, $date_range);

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