<?php
    require_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/AboutDao.php";
    include_once PATH_ROOT_ADMIN."/view/handleShow/showIntroduction.php";
    $aboutDao = new AboutDao();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    $aboutDao->updateStatusIntro($id, $status);
    $allIntroduction= $aboutDao->getAllIntro();
    showIntroduction($allIntroduction);
?>