<?php

namespace Pixelabs\StoreManagement\Helpers;

class RequestTracker {

    public static function trackRequest() {
        $instance = new self();
        $instance->processRequest();
    }


    private function processRequest() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $isMobile = $this->isMobileUserAgent($userAgent);

        if (!$this->isIPCountedToday($ip)) {
            $this->markIPCountedToday($ip);
            $this->incrementCounter($isMobile, $ip);
        }
    }

    private function isIPCountedToday($ip) {
        global $connection;
        $stmt = $connection->prepare("SELECT COUNT(*) FROM request_tracking WHERE ip_address = ? AND request_date = CURDATE()");
        $stmt->bind_param('s', $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_row()[0]; 
        $stmt->close();
        return ($count > 0);
    }

    private function markIPCountedToday($ip) {
        global $connection;
        $stmt = $connection->prepare("INSERT INTO request_tracking (ip_address, request_date) VALUES (?, CURDATE())");
        $stmt->bind_param('s', $ip);
        $stmt->execute();
        $stmt->close();
    }

    private function incrementCounter($isMobile, $ip) {
        global $connection;
        $stmt = $connection->prepare("UPDATE request_tracking SET is_mobile = ? WHERE ip_address = ? AND request_date = CURDATE()");
        $stmt->bind_param('is', $isMobile, $ip);
        $stmt->execute();
        $stmt->close();
    }

    private function isMobileUserAgent($userAgent) {
        return (strpos($userAgent, 'Mobile') !== false || strpos($userAgent, 'Android') !== false || strpos($userAgent, 'iPhone') !== false || strpos($userAgent, 'iPad') !== false);
    }
}
