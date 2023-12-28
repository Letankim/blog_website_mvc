<?php
    include_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/PostDao.php";
    include_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
    include_once PATH_ROOT_ADMIN."/view/handleShow/showPost.php";
    $postDao = new PostDao();
    $navId = $_POST['navId'];
    $filterResult;
    if($navId == -1) {
        $filterResult =  $postDao->getAllPost();
    } else {
        $filterResult =  $postDao->getFilterPost($navId);
    }
    showPost($filterResult);
?>