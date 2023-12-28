<?php
    require_once "../../config/config.php";
    require_once PATH_ROOT_ADMIN."/DAO/SloganDao.php";
    include_once PATH_ROOT_ADMIN."/view/handleShow/showSlogan.php";
    $sloganDao = new SloganDao();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    $sloganDao->updateStatusSlogan($id, $status);
    $allSlogan= $sloganDao->getAllSlogan();
    showSlogan($allSlogan);
?>