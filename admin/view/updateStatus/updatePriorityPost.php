<?php
    require_once "../../config/config.php";
    require_once PATH_ROOT_ADMIN."/DAO/PostDao.php";
    require_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
    require_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
    require_once PATH_ROOT_ADMIN."/view/handleShow/showPost.php";
    $TYPE = "Status";
    $postDao = new PostDao();
    $id = $_POST['id'];
    $priority = $_POST['priority'];
    $priority = $priority == 1 ? 0 : 1;
    $postDao->updatePriorityPost($id, $priority);
    $allPost = $postDao->getAllPost();
    showPost($allPost);
?>