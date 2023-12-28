<?php
    session_start();
    require_once "../../config/config.php";
    require_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
    require_once PATH_ROOT_ADMIN."/view/handleShow/showAccount.php";
    $userDao = new UserDao();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    $userDao->updateStatusUser($id, $status);
    $allUser = $userDao->getAllUsers();
    showAccount($allUser);
?>