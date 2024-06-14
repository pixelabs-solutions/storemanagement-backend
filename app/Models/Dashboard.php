<?php
namespace Pixelabs\StoreManagement\Models;

use GuzzleHttp\Client;
use Pixelabs\StoreManagement\Models\Base;

class Dashboard
{

    public static function get_dashboard_stats($filters = [])
    {
        $user_id = Authentication::getUserIdFromToken();
        $date_range = $filters ? self::getDateRange($filters) : [];
        try {

            $products = Base::get_number_of_products($user_id, $date_range);
            $new_customers_count = Base::get_new_customers_count($user_id, $date_range);
            $total_transactions = Base::get_total_revenue($user_id, $date_range);
            $total_orders = Base::get_number_of_orders($user_id, $date_range);

            $data = [
                'new_products' => $products,
                'new_customers' => $new_customers_count,
                'total_orders' => $total_orders,
                'total_transactions' => $total_transactions
            ];
            return $data;
        } catch (\Exception $e) {
            echo 'Error fetching dashboard statistics: ' . $e->getMessage();
            return [];
        }
    }


    public static function get_dashboard_data($filters = [])
    {
        global $connection;
        $date_range = $filters ? self::getDateRange($filters) : [];

        $user_id = Authentication::getUserIdFromToken();
        $cities = [];
        $total_customers = 0;
        $latestOrders = [];
        // $client = new Client();
        try {
            $date_after = $date_range['after'];
            $date_before = $date_range['before'];
            // echo json_encode($date_before);

            $query = "SELECT 
        city, 
        total_sum,
        overall_total_sum,
        (total_sum / overall_total_sum) * 100 AS percentage
    FROM 
        (SELECT 
            city, 
            SUM(total) AS total_sum, 
            (SELECT SUM(total_sum) 
                FROM (SELECT SUM(total) AS total_sum
                    FROM transactions 
                    WHERE user_id = ? AND
                    date_created <= ? AND
                    date_created >= ?
                    GROUP BY city) AS subquery) AS overall_total_sum
        FROM 
            transactions 
        WHERE 
            user_id = ? AND
            date_created <= ? AND
            date_created >= ?
        GROUP BY 
            city
        ORDER BY 
            total_sum DESC
        LIMIT 5) AS top_cities;";

            $stmt = $connection->prepare($query);
            $stmt->bind_param("ississ", $user_id, $date_before, $date_after, $user_id, $date_before, $date_after);
            $stmt->execute();
            $result = $stmt->get_result();

            $customerOrdersCount = [];
            $overall_total_sum = 0;
            // if($orders === null) return 0;
            $formattedCities = [];
            $latestOrders = [];
            while ($order = $result->fetch_assoc()) {
                $formattedCities[] = [
                    'city' => $order['city'],
                    'percentage_of_customers' => $order['percentage'] . '%'
                ];
                //    var_dump($overall_total_sum);

                // $billing_information = json_decode($order['billing'], true);

                // $city = $order['city'] ?? '';
                // $city = trim($city);
                // if (empty($city)) {
                //     $city = 'Unknown City';
                // }
                // if (!isset($cities[$city])) {
                //     $cities[$city] = ['customer_ids' => []];
                // }
                // if (!array_key_exists($order['customer_id'], $cities[$city]['customer_ids'])) {
                //     $cities[$city]['customer_ids'][$order['customer_id']] = true;
                //     $total_customers++;
                // }

                // $client_name = $billing_information['first_name'] . ' ' . $billing_information['last_name'];
                // // echo $order;
                // $latestOrders[] = [
                //     'order_id' => $order['id'],
                //     'sum' => $order['total'],
                //     'date' => $order['date_created'],
                //     'client' => $client_name
                // ];
                // if (count($latestOrders) > 3) {
                //     array_shift($latestOrders);
                // }

            }

            // $cityData = [];
            // foreach ($cities as $city => $data) {
            //     $customer_count = count($data['customer_ids']);
            //     $percentage = $total_customers > 0 ? ($customer_count / $total_customers * 100) : 0;
            //     $cityData[$city] = $percentage;
            // }
            // arsort($cityData);
            // $topCities = array_slice($cityData, 0, 5, true);

            // // Prepare output format
            // $formattedCities = [];
            // foreach ($topCities as $city => $percentage) {
            //     $formattedCities[] = [
            //         'city' => $city,
            //         'percentage_of_customers' => number_format($percentage, 2) . '%'
            //     ];
            // }

            // var_dump($formattedCities);
            $query = "SELECT * from transactions WHERE user_id = ? AND date_created <= ? AND date_created >= ? ORDER BY date_created DESC LIMIT 4";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("iss", $user_id, $date_before, $date_after);
            $stmt->execute();
            $result = $stmt->get_result();

            // $result = $connection->query($query);
            while ($order = $result->fetch_assoc()) {
                $billing_information = json_decode($order['billing'], true);

                $client_name = $billing_information['first_name'] . ' ' . $billing_information['last_name'];

                $latestOrders[] = [
                    'order_id' => $order['id'],
                    'sum' => $order['total'],
                    'date' => $order['date_created'],
                    'client' => $client_name
                ];

            }
            // var_dump($latestOrders);

            return [
                'cities_data' => $formattedCities,
                'latest_orders' => $latestOrders
            ];
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return 'Error fetching orders: ' . $e->getMessage();
        }
    }


    public static function fetchTopSellingProductImages($configuration = [])
    {
        global $connection;
        $user_id = Authentication::getUserIdFromToken();
        $productSales = [];

        try {
            $query = "SELECT * FROM transactions WHERE user_id = $user_id";
            $result = $connection->query($query);

            $customerOrdersCount = [];
            while ($order = $result->fetch_assoc()) {

                $order_lineitem_array = json_decode($order['line_items'], true);
                foreach ($order_lineitem_array as $item) {
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

                $prod_query = "SELECT * FROM products WHERE user_id = $user_id AND id = $productId";
                $prod_result = $connection->query($prod_query);
                $productDetails = $prod_result->fetch_assoc();
                $product_image_decoded = json_decode($productDetails['images'], true);
                $topProducts[] = [
                    'product_name' => $productDetails['name'],
                    'image_url' => $product_image_decoded[0]['src']
                ];
            }
            return $topProducts;

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return 'Error fetching product data: ' . $e->getMessage();
        }
    }


    public static function getDateRange($filters)
    {

        if (
            isset($filters['date_from']) && $filters['date_from'] !== "" &&
            isset($filters['date_to']) && $filters['date_to'] !== ""
        ) {
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