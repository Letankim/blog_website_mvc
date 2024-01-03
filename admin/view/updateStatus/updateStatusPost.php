<?php
    require_once "../../config/config.php";
    require_once PATH_ROOT_ADMIN."/DAO/PostDao.php";
    require_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
    require_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
    require_once PATH_ROOT_ADMIN."/view/handleShow/showPost.php";
    $postDao = new PostDao();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    $postDao->updateStatusPost($id, $status);
    $allPost = $postDao->getAllPost();
    showPost($allPost);
?>