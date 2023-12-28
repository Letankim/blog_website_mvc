<?php
    require_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
    include_once PATH_ROOT_ADMIN."/view/handleShow/showNavigation.php";
    $navigationDao = new NavigationDao();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    $navigationDao->updateStatusNav($id, $status);
    $allNav = $navigationDao->getAllNav();
    showNavigation($allNav);
?>