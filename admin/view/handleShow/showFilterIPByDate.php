<?php
    include "../../model/connectdb.php";
    include "../../model/IP.php";
    include "./showIP.php";
    $date = $_POST['date'];
    $filterResult = "";
    if($date == -1) {
        $filterResult = getAllIP();
    } else {
        $filterResult = getFilterDate($date);
    }
    showIP($filterResult);
?>