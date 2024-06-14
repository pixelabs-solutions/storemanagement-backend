<?php

namespace Pixelabs\StoreManagement\Models;
use GuzzleHttp\Client;
use Pixelabs\StoreManagement\Models\Base;

class Statistics
{
    public static function get_products_stats($filters = [])
    {
        global $connection;
        $date_range = self::getDateRange($filters);
        try {
            $user_id = Authentication::getUserIdFromToken();
            $totalProducts = [];
            $normalProducts = [];
            $saleProducts = [];
            $numberOfOrders = [];
            $distinctProductsOnOrder = [];

            $totalProductCount = 0;
            $totalNormalProductCount = 0;
            $totalSaleProductCount = 0;
            $totalOrderCount = 0;
            $totalDistinctProductsOnOrderCount = 0;

            // Initialize date range for grouping
            $groupBy = '';
            if (!empty($date_range)) {
                if ($filters['query'] == 'last_week') {
                    $groupBy = 'DAY';
                    $period = new \DatePeriod(
                        new \DateTime($date_range['after']),
                        new \DateInterval('P1D'),
                        (new \DateTime($date_range['before']))->modify('+1 day')
                    );
                    foreach ($period as $date) {
                        $formattedDate = $date->format('Y-m-d');
                        $totalProducts[$formattedDate] = 0;
                        $normalProducts[$formattedDate] = 0;
                        $saleProducts[$formattedDate] = 0;
                        $numberOfOrders[$formattedDate] = 0;
                        $distinctProductsOnOrder[$formattedDate] = [];
                    }
                } elseif ($filters['query'] == 'current_month') {
                    $groupBy = 'WEEK';
                    $start = new \DateTime($date_range['after']);
                    $end = new \DateTime($date_range['before']);
                    $end = $end->modify('+1 day');
                    $interval = new \DateInterval('P1W');
                    $period = new \DatePeriod($start, $interval, $end);
                    $weekNumber = 1;
                    foreach ($period as $date) {
                        $periodKey = self::ordinal($weekNumber) . ' week of ' . $date->format('F');
                        $totalProducts[$periodKey] = 0;
                        $normalProducts[$periodKey] = 0;
                        $saleProducts[$periodKey] = 0;
                        $numberOfOrders[$periodKey] = 0;
                        $distinctProductsOnOrder[$periodKey] = [];
                        $weekNumber++;
                    }
                } elseif ($filters['query'] == 'last_year') {
                    $groupBy = 'MONTH';
                    $start = new \DateTime($date_range['after']);
                    $end = new \DateTime($date_range['before']);
                    $interval = new \DateInterval('P1M');
                    $period = new \DatePeriod($start, $interval, $end);
                    foreach ($period as $date) {
                        $month = $date->format('Y-m');
                        $totalProducts[$month] = 0;
                        $normalProducts[$month] = 0;
                        $saleProducts[$month] = 0;
                        $numberOfOrders[$month] = 0;
                        $distinctProductsOnOrder[$month] = [];
                    }
                } elseif (!empty($filters['date_from']) && !empty($filters['date_to'])) {
                    $groupBy = 'DAY';
                    $period = new \DatePeriod(
                        new \DateTime($date_range['after']),
                        new \DateInterval('P1D'),
                        (new \DateTime($date_range['before']))->modify('+1 day')
                    );
                    foreach ($period as $date) {
                        $formattedDate = $date->format('Y-m-d');
                        $totalProducts[$formattedDate] = 0;
                        $normalProducts[$formattedDate] = 0;
                        $saleProducts[$formattedDate] = 0;
                        $numberOfOrders[$formattedDate] = 0;
                        $distinctProductsOnOrder[$formattedDate] = [];
                    }
                }
            }

            // SQL query to get products and group by the specified period
            $query = "SELECT DATE_FORMAT(date_created, '%Y-%m-%d') as day, DATE_FORMAT(date_created, '%Y-%m') as month, WEEK(date_created, 3) as week, type, sale_price FROM products WHERE user_id = $user_id";
            if (!empty($date_range)) {
                $query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
            $result = $connection->query($query);
            while ($product = $result->fetch_assoc()) {
                if ($groupBy == 'DAY') {
                    $periodKey = $product['day'];
                } elseif ($groupBy == 'WEEK') {
                    $week = $product['week'] - intval((new \DateTime($date_range['after']))->format('W')) + 1;
                    $periodKey = self::ordinal($week) . ' week of ' . (new \DateTime($product['day']))->format('F');
                } elseif ($groupBy == 'MONTH') {
                    $periodKey = $product['month'];
                }

                if (!isset($totalProducts[$periodKey])) {
                    $totalProducts[$periodKey] = 0;
                }
                $totalProducts[$periodKey]++;
                $totalProductCount++;

                if (!isset($normalProducts[$periodKey])) {
                    $normalProducts[$periodKey] = 0;
                }
                if (!isset($saleProducts[$periodKey])) {
                    $saleProducts[$periodKey] = 0;
                }
                if ($product['type'] === 'simple') {
                    $normalProducts[$periodKey]++;
                    $totalNormalProductCount++;
                }
                if (!is_null($product['sale_price'])) {
                    $saleProducts[$periodKey]++;
                    $totalSaleProductCount++;
                }
            }

            // SQL query to count the number of orders and group by the specified period
            $query = "SELECT DATE_FORMAT(date_created, '%Y-%m-%d') as day, DATE_FORMAT(date_created, '%Y-%m') as month, WEEK(date_created, 3) as week, COUNT(*) as transaction_count FROM transactions WHERE user_id = $user_id";
            if (!empty($date_range)) {
                $query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
            $query .= " GROUP BY ";
            if ($groupBy == 'DAY') {
                $query .= "day";
            } elseif ($groupBy == 'WEEK') {
                $query .= "week";
            } elseif ($groupBy == 'MONTH') {
                $query .= "month";
            }
            $result = $connection->query($query);
            while ($row = $result->fetch_assoc()) {
                if ($groupBy == 'DAY') {
                    $periodKey = $row['day'];
                } elseif ($groupBy == 'WEEK') {
                    $week = $row['week'] - intval((new \DateTime($date_range['after']))->format('W')) + 1;
                    $periodKey = self::ordinal($week) . ' week of ' . (new \DateTime($row['day']))->format('F');
                } elseif ($groupBy == 'MONTH') {
                    $periodKey = $row['month'];
                }
                if (!isset($numberOfOrders[$periodKey])) {
                    $numberOfOrders[$periodKey] = 0;
                }
                $numberOfOrders[$periodKey] = $row['transaction_count'];
                $totalOrderCount += $row['transaction_count'];
            }

            // SQL query to get line items from transactions and group by the specified period
            $order_query = "SELECT DATE_FORMAT(date_created, '%Y-%m-%d') as day, DATE_FORMAT(date_created, '%Y-%m') as month, WEEK(date_created, 3) as week, line_items FROM transactions WHERE user_id = $user_id";
            if (!empty($date_range)) {
                $order_query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }

            $order_result = $connection->query($order_query);
            while ($order = $order_result->fetch_assoc()) {
                if ($groupBy == 'DAY') {
                    $periodKey = $order['day'];
                } elseif ($groupBy == 'WEEK') {
                    $week = $order['week'] - intval((new \DateTime($date_range['after']))->format('W')) + 1;
                    $periodKey = self::ordinal($week) . ' week of ' . (new \DateTime($order['day']))->format('F');
                } elseif ($groupBy == 'MONTH') {
                    $periodKey = $order['month'];
                }
                if (!isset($distinctProductsOnOrder[$periodKey])) {
                    $distinctProductsOnOrder[$periodKey] = [];
                }
                $line_items = json_decode($order['line_items'], true);
                if (is_array($line_items)) {
                    foreach ($line_items as $item) {
                        $distinctProductsOnOrder[$periodKey][$item['product_id']] = true;
                    }
                }
            }

            // Convert distinctProductsOnOrder counts
            foreach ($distinctProductsOnOrder as $day => $products) {
                $distinctProductsOnOrder[$day] = count($products);
                $totalDistinctProductsOnOrderCount += count($products);
            }

            return [
                'totalProducts' => [
                    'total' => $totalProductCount,
                    'byDate' => $totalProducts
                ],
                'normalProducts' => [
                    'total' => $totalNormalProductCount,
                    'byDate' => $normalProducts                    
                ],
                'saleProducts' => [
                    'total' => $totalSaleProductCount,
                    'byDate' => $saleProducts                    
                ],
                'numberOfOrders' => [
                    'total' => $totalOrderCount,
                    'byDate' => $numberOfOrders                    
                ],
                'totalDistinctProductsOnOrder' => [
                    'total' => $totalDistinctProductsOnOrderCount,
                    'byDate' => $distinctProductsOnOrder                    
                ]
            ];
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }


    
    public static function get_orders_stats($filters = [])
    {
        global $connection;
        $date_range = self::getDateRange($filters);
        try {
            $user_id = Authentication::getUserIdFromToken();

            $groupBy = ''; // Variable to determine grouping (DAY, WEEK, MONTH)
            $totalOrders = [];
            $totalRevenue = [];
            $totalItems = [];
            $customers = [];
            $distinctCustomers = [];

            $totalOrderCount = 0;
            $totalRevenueAmount = 0;
            $totalItemCount = 0;
            $totalCustomerCount = 0;

            // Initialize date range for grouping
            if (!empty($date_range)) {
                if ($filters['query'] == 'last_week') {
                    $groupBy = 'DAY';
                    $period = new \DatePeriod(
                        new \DateTime($date_range['after']),
                        new \DateInterval('P1D'),
                        (new \DateTime($date_range['before']))->modify('+1 day')
                    );
                    foreach ($period as $date) {
                        $formattedDate = $date->format('Y-m-d');
                        $totalOrders[$formattedDate] = 0;
                        $totalRevenue[$formattedDate] = 0;
                        $totalItems[$formattedDate] = 0;
                        $customers[$formattedDate] = [];
                    }
                } elseif ($filters['query'] == 'current_month') {
                    $groupBy = 'WEEK';
                    $start = new \DateTime($date_range['after']);
                    $end = new \DateTime($date_range['before']);
                    $end = $end->modify('+1 day');
                    $interval = new \DateInterval('P1W');
                    $period = new \DatePeriod($start, $interval, $end);
                    $weekNumber = 1;
                    foreach ($period as $date) {
                        $periodKey = self::ordinal($weekNumber) . ' week of ' . $date->format('F');
                        $totalOrders[$periodKey] = 0;
                        $totalRevenue[$periodKey] = 0;
                        $totalItems[$periodKey] = 0;
                        $customers[$periodKey] = [];
                        $weekNumber++;
                    }
                } elseif ($filters['query'] == 'last_year') {
                    $groupBy = 'MONTH';
                    $start = new \DateTime($date_range['after']);
                    $end = new \DateTime($date_range['before']);
                    $interval = new \DateInterval('P1M');
                    $period = new \DatePeriod($start, $interval, $end);
                    foreach ($period as $date) {
                        $periodKey = $date->format('Y-m');
                        $totalOrders[$periodKey] = 0;
                        $totalRevenue[$periodKey] = 0;
                        $totalItems[$periodKey] = 0;
                        $customers[$periodKey] = [];
                    }
                } elseif (!empty($filters['date_from']) && !empty($filters['date_to'])) {
                    $groupBy = 'DAY';
                    $period = new \DatePeriod(
                        new \DateTime($date_range['after']),
                        new \DateInterval('P1D'),
                        (new \DateTime($date_range['before']))->modify('+1 day')
                    );
                    foreach ($period as $date) {
                        $formattedDate = $date->format('Y-m-d');
                        $totalOrders[$formattedDate] = 0;
                        $totalRevenue[$formattedDate] = 0;
                        $totalItems[$formattedDate] = 0;
                        $customers[$formattedDate] = [];
                    }
                }
            }

            // SQL query to get orders and group by the specified period
            $query = "SELECT DATE_FORMAT(date_created, '%Y-%m-%d') as day, DATE_FORMAT(date_created, '%Y-%m') as month, WEEK(date_created, 3) as week, total, line_items, customer_id FROM transactions WHERE user_id = $user_id";
            if (!empty($date_range)) {
                $query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
            $result = $connection->query($query);
            while ($order = $result->fetch_assoc()) {
                if ($groupBy == 'DAY') {
                    $periodKey = $order['day'];
                } elseif ($groupBy == 'WEEK') {
                    $week = $order['week'] - intval((new \DateTime($date_range['after']))->format('W')) + 1;
                    $periodKey = self::ordinal($week) . ' week of ' . (new \DateTime($order['day']))->format('F');
                } elseif ($groupBy == 'MONTH') {
                    $periodKey = $order['month'];
                }

                // Initialize variables if not set
                if (!isset($totalOrders[$periodKey])) {
                    $totalOrders[$periodKey] = 0;
                }
                if (!isset($totalRevenue[$periodKey])) {
                    $totalRevenue[$periodKey] = 0;
                }
                if (!isset($totalItems[$periodKey])) {
                    $totalItems[$periodKey] = 0;
                }
                if (!isset($customers[$periodKey])) {
                    $customers[$periodKey] = [];
                }

                $totalOrders[$periodKey]++;
                $totalOrderCount++;

                $totalRevenue[$periodKey] += $order['total'];
                $totalRevenueAmount += $order['total'];

                $line_items = json_decode($order['line_items'], true);
                if (is_array($line_items)) {
                    $itemCount = count($line_items);
                    $totalItems[$periodKey] += $itemCount;
                    $totalItemCount += $itemCount;
                }

                if (!in_array($order['customer_id'], $customers[$periodKey])) {
                    $customers[$periodKey][] = $order['customer_id'];
                }
            }

            // Calculate total distinct customers
            foreach ($customers as $periodKey => $customerList) {
                foreach ($customerList as $customer) {
                    if (!in_array($customer, $distinctCustomers)) {
                        $distinctCustomers[] = $customer;
                    }
                }
            }
            $totalCustomerCount = count($distinctCustomers);

            // Calculate averages
            $orderAverage = [];
            $averageItems = [];

            // Calculate orderAverage and averageItems only if totalOrderCount > 0
            if ($totalOrderCount > 0) {
                foreach ($totalRevenue as $periodKey => $revenue) {
                    $orderAverage[$periodKey] = ($totalOrders[$periodKey] <= 0) ? 0 : round($revenue / $totalOrders[$periodKey]);
                }

                foreach ($totalItems as $periodKey => $items) {
                    $averageItems[$periodKey] = ($totalOrders[$periodKey] <= 0) ? 0 : round($items / $totalOrders[$periodKey]);
                }
            } else {
                // Handle case where totalOrderCount is 0 (division by zero)
                $orderAverage = array_fill_keys(array_keys($totalOrders), 0);
                $averageItems = array_fill_keys(array_keys($totalItems), 0);
            }

            return [
                'totalOrders' => [
                    'total' => $totalOrderCount,
                    'byDate' => $totalOrders
                ],
                'totalRevenue' => [
                    'total' => $totalRevenueAmount,
                    'byDate' => $totalRevenue
                ],
                'orderAverage' => [
                    'total' => $totalOrderCount > 0 ? round($totalRevenueAmount / $totalOrderCount) : 0,
                    'byDate' => $orderAverage
                ],
                'averageItems' => [
                    'total' => $totalOrderCount > 0 ? round($totalItemCount / $totalOrderCount) : 0,
                    'byDate' => $averageItems
                ],
                'totalCustomers' => [
                    'total' => $totalCustomerCount,
                    'byDate' => array_map('count', $customers)
                ]
            ];
        } catch (\Exception $e) {
            echo 'Error fetching orders: ' . $e->getMessage();
            return [];
        }
    }

    public static function get_revenue_stats($filters = []) {
        global $connection;
        $date_range = self::getDateRange($filters);
        try {
            $user_id = Authentication::getUserIdFromToken();
    
            // Initialize months array based on date range
            $months = [];
            if (!empty($date_range)) {
                if ($filters['query'] == 'last_week') {
                    $groupBy = 'DAY';
                    $period = new \DatePeriod(
                        new \DateTime($date_range['after']),
                        new \DateInterval('P1D'),
                        (new \DateTime($date_range['before']))->modify('+1 day')
                    );
                    foreach ($period as $date) {
                        $formattedDate = $date->format('Y-m-d');
                        $months[$formattedDate] = 0;
                    }
                } elseif ($filters['query'] == 'current_month') {
                    $groupBy = 'WEEK';
                    $start = new \DateTime($date_range['after']);
                    $end = new \DateTime($date_range['before']);
                    $end = $end->modify('+1 day');
                    $interval = new \DateInterval('P1W');
                    $period = new \DatePeriod($start, $interval, $end);
                    $weekNumber = 1;
                    foreach ($period as $date) {
                        $periodKey = self::ordinal($weekNumber) . ' week of ' . $date->format('F');
                        $months[$periodKey] = 0;
                        $weekNumber++;
                    }
                } elseif ($filters['query'] == 'last_year') {
                    $groupBy = 'MONTH';
                    $start = new \DateTime($date_range['after']);
                    $end = new \DateTime($date_range['before']);
                    $interval = new \DateInterval('P1M');
                    $period = new \DatePeriod($start, $interval, $end);
                    foreach ($period as $date) {
                        $month = $date->format('Y-m');
                        $months[$month] = 0;
                    }
                } elseif (!empty($filters['date_from']) && !empty($filters['date_to'])) {
                    $groupBy = 'DAY';
                    $period = new \DatePeriod(
                        new \DateTime($date_range['after']),
                        new \DateInterval('P1D'),
                        (new \DateTime($date_range['before']))->modify('+1 day')
                    );
                    foreach ($period as $date) {
                        $formattedDate = $date->format('Y-m-d');
                        $months[$formattedDate] = 0;
                    }
                }
            }
    
            // Initialize response structure
            $response = [
                'totalRevenue' => ['total' => 0, 'byDate' => $months],
                'totalRehearsals' => ['total' => 0, 'byDate' => $months],
                'orderAverage' => ['total' => 0, 'byDate' => $months],
                'totalShipments' => ['total' => 0, 'byDate' => $months],
                'netIncome' => ['total' => 0, 'byDate' => $months],
                'numberOfOrders' => ['total' => 0, 'byDate' => $months],
                'totalDistinctProductsOnOrder' => ['total' => 0, 'byDate' => $months]
            ];
    
            // SQL query to get revenue and group by the specified period
            $query = "SELECT DATE_FORMAT(date_created, '%Y-%m-%d') as day, DATE_FORMAT(date_created, '%Y-%m') as month, WEEK(date_created, 3) as week, SUM(total) as total_revenue FROM transactions WHERE user_id = $user_id";
            if (!empty($date_range)) {
                $query .= " AND date_created >= '" . $date_range['after'] . "' AND date_created <= '" . $date_range['before'] . "'";
            }
            $query .= " GROUP BY ";
            if ($groupBy == 'DAY') {
                $query .= "day";
            } elseif ($groupBy == 'WEEK') {
                $query .= "week";
            } elseif ($groupBy == 'MONTH') {
                $query .= "month";
            }
            $result = $connection->query($query);
            
            while ($row = $result->fetch_assoc()) {
                if ($groupBy == 'DAY') {
                    $periodKey = $row['day'];
                } elseif ($groupBy == 'WEEK') {
                    $week = $row['week'] - intval((new \DateTime($date_range['after']))->format('W')) + 1;
                    $periodKey = self::ordinal($week) . ' week of ' . (new \DateTime($row['day']))->format('F');
                } elseif ($groupBy == 'MONTH') {
                    $periodKey = $row['month'];
                }
                if (isset($response['totalRevenue']['byDate'][$periodKey])) {
                    $response['totalRevenue']['byDate'][$periodKey] += floatval($row['total_revenue']);
                    $response['totalRevenue']['total'] += floatval($row['total_revenue']);
                }
            }
    
    
            return $response;
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
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

    private static function ordinal($number)
    {
        $ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];
        if ((($number % 100) >= 11) && (($number % 100) <= 13))
            return $number . 'th';
        else
            return $number . $ends[$number % 10];
    }
}