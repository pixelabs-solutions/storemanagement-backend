<?php

namespace Pixelabs\StoreManagement\Models;
use Pixelabs\StoreManagement\Models\Authentication;

class Goal
{
    public static function add($data)
    {
        global $connection;
        $user_id = Authentication::getUserId();
        echo $user_id;
        if ($user_id == null) {
            // return json_encode([
            //     "message" => "User not authenticated.",
            //     "status_code" => 401 
            // ]);
            header('Location: /authentication/login');
        }

        $query = "INSERT INTO goals 
        (
            user_id,
            new_orders_target, -- int
            new_customers_target, -- int
            sales_revenue_target, -- int
            target_keywords, -- int
            google_rankings_target, -- int
            page_views_target, -- int
            avg_order_value_increase_target, -- float
            avg_order_items_increase_target, -- float
            new_products_target -- int
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($query);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $connection->error);
        }

        $new_orders_target = $data['new_orders_target'];
        $new_customers_target = $data['new_customers_target'];
        $sales_revenue_target = $data['sales_revenue_target'];
        $target_keywords = $data['target_keywords'];
        $google_rankings_target = $data['google_rankings_target'];
        $page_views_target = $data['page_views_target'];
        $avg_order_value_increase_target = $data['avg_order_value_increase_target'];
        $avg_order_items_increase_target = $data['avg_order_items_increase_target'];
        $new_products_target = $data['new_products_target'];

        $stmt->bind_param(
            "iiiiiiiddi",
            $user_id,
            $new_orders_target,
            $new_customers_target,
            $sales_revenue_target,
            $target_keywords,
            $google_rankings_target,
            $page_views_target,
            $avg_order_value_increase_target,
            $avg_order_items_increase_target,
            $new_products_target
        );

        if ($stmt->execute()) {
            return json_encode([
                "message" => "Settings added successfully",
                "status_code" => 201
            ]);
        } else {
            return json_encode([
                "message" => "Error: " . $stmt->error,
                "status_code" => 500
            ]);
        }
        $stmt->close();
    }


    public static function update($data)
    {
        global $connection;
        $user_id = Authentication::getUserId();
        if ($user_id == null) {
            header('Location: /authentication/login');
            exit();
        }


        $query = "UPDATE goals SET
        new_orders_target = ?,
        new_customers_target = ?,
        sales_revenue_target = ?,
        target_keywords = ?,
        google_rankings_target = ?,
        page_views_target = ?,
        avg_order_value_increase_target = ?,
        avg_order_items_increase_target = ?,
        new_products_target = ?
        WHERE user_id = ?";
        $stmt = $connection->prepare($query);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $connection->error);
        }

        $new_orders_target = $data['new_orders_target'];
        $new_customers_target = $data['new_customers_target'];
        $sales_revenue_target = $data['sales_revenue_target'];
        $target_keywords = $data['target_keywords'];
        $google_rankings_target = $data['google_rankings_target'];
        $page_views_target = $data['page_views_target'];
        $avg_order_value_increase_target = $data['avg_order_value_increase_target'];
        $avg_order_items_increase_target = $data['avg_order_items_increase_target'];
        $new_products_target = $data['new_products_target'];

        $stmt->bind_param(
            "iiiiiiddii",
            $new_orders_target,
            $new_customers_target,
            $sales_revenue_target,
            $target_keywords,
            $google_rankings_target,
            $page_views_target,
            $avg_order_value_increase_target,
            $avg_order_items_increase_target,
            $new_products_target,
            $user_id
        );

        if ($stmt->execute()) {
            return json_encode([
                "message" => "Settings updated successfully",
                "status_code" => 200
            ]);
        } else {
            return json_encode([
                "message" => "Error: " . $stmt->error,
                "status_code" => 500
            ]);
        }
        $stmt->close();
    }

    public static function get_goals_target(){
        global $connection;
        $user_id = Authentication::getUserId();
        
        $sql = "SELECT * FROM `goals` WHERE user_id = ?";
        $stmt = $connection->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Failed to prepare the SQL statement: " . $connection->error);
        }
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $stmt->close();
            return $data;
        }
        else {
            $stmt->close();
            throw new Exception("Failed to execute the SQL statement: " . $connection->error);
        }                                                                   
    }

    public static function get_goals()
    {
        $response = json_decode(Configuration::getConfiguration(), true);
        if ($response['status_code'] != 200) {
            echo $response["message"];
            return [];
        }
        $data = $response['data'];

        $start = new \DateTime();
        $end = new \DateTime();
        $start->modify('first day of this month');
        $end->modify('last day of this month');
        $params = [
            'auth' => [$data["consumer_key"], $data["consumer_secret"]],
            'after' => $start->format('Y-m-d') . 'T00:00:00',
            'before' => $end->format('Y-m-d') . 'T23:59:59'
        ];

        $goals = self::get_goals_target();
        $totalRevenue = Base::get_total_revenue($data["store_url"], $params);
        $new_customers = Base::get_new_customers_count($data["store_url"], $params);
        $orders = Base::get_number_of_orders($data["store_url"], $params);
        $products = Base::get_number_of_products($data["store_url"], $params);
        $current_month_raise_in_orders = Base::calculate_raise_in_orders($data["store_url"], $params);

        //Modify date parameter for last month
        $start->modify('first day of last month');
        $end->modify('last day of last month');
        $params['after'] = $start->format('Y-m-d') . 'T00:00:00';
        $params['before'] = $end->format('Y-m-d') . 'T23:59:59';

        $previous_month_raise_in_average_orders = Base::calculate_raise_in_orders($data["store_url"], $params);

        $current_month_average_items = $current_month_raise_in_orders['average_items'];
        $previous_month_average_items = $previous_month_raise_in_average_orders['average_items'];
        $current_month_average_price = $current_month_raise_in_orders['average_price'];
        $previous_month_average_price = $previous_month_raise_in_average_orders['average_price'];

        $raise_in_average_items = (($current_month_average_items - $previous_month_average_items)/$previous_month_average_items)*100;
        $raise_in_average_price = (($current_month_average_price - $previous_month_average_price)/$previous_month_average_price)*100;
        $goals_data = [
            "orders" => [
                "target" => $goals['sales_revenue_target'],
                "sales" => $totalRevenue
            ],
            "new_customers" => [
                "target" => $goals['new_customers_target'],
                "customers_count" => $new_customers
            ],
            "new_orders" => [
                "target" => $goals['new_orders_target'],
                "orders_count" => $orders
            ],
            "new_products" => [
                "target" => $goals['new_products_target'],
                "products_count" => $products
            ],
            "keywords" => [
                "target" => $goals['target_keywords']
            ],
            "google_rankings" => [
                "target" => $goals['google_rankings_target']
            ],
            "page_views" => [
                "target" => $goals['page_views_target']
            ],
            "avg_order_value_increase" => [
                "target" => $goals['avg_order_value_increase_target'],
                "rasie_in_average_price" => $raise_in_average_price
            ],
            "avg_order_items_increase" => [
                "target" => $goals['avg_order_items_increase_target'],
                "rasie_in_average_items" => $raise_in_average_items
            ]
        ];

        return $goals_data;
    } 
}
