<?php
    require_once "../../config/config.php";
    require_once PATH_ROOT_ADMIN."/DAO/AdvertiseDao.php";
    require_once PATH_ROOT_ADMIN."/view/handleShow/showAdvertise.php";
    $advertiseDao = new AdvertiseDao();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    $advertiseDao->updateStatusAdvertise($id, $status);
    $allAdvertise = $advertiseDao->getAllAdvertise();
    showAdvertise($allAdvertise);
?>