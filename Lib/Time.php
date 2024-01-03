<?php
    function getCurrentTime() {
        $zone_Asia_Ho_Chi_Minh = date_default_timezone_set('Asia/Ho_Chi_Minh');
        return $time_post= date('Y/m/d H:i:s');;
    }
?>