<?php
    session_start();
    include_once "../../config/config.php";
    $status = $_POST['status'];
    $typePage = $_POST['typePage'];
    switch ($typePage) {
        case 'Navigation':
        case 'Update navigation':
            include_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
            include_once PATH_ROOT_ADMIN."/view/handleShow/showNavigation.php";
            $navigationDao = new NavigationDao();
            if($status == -1) {
                $resultFilter = $navigationDao->getAllNav();
            } else {
                $resultFilter = $navigationDao->getFilterNav($status);
            }
            showNavigation($resultFilter);
            break;
        case 'Banner':
            include_once PATH_ROOT_ADMIN."/DAO/BannerDao.php";
            include_once PATH_ROOT_ADMIN."/view/handleShow/showBanner.php";
            $bannerDao = new BannerDao();
            if($status == -1) {
                $resultFilter = $bannerDao->getAllBanner();
            } else {
                $resultFilter = $bannerDao->getFilterBanner($status);
            }
            showBanner($resultFilter);
            break;
        case 'Posts':
        case 'Update post':
            include_once PATH_ROOT_ADMIN."/DAO/PostDao.php";
            include_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
            include_once PATH_ROOT_ADMIN."/view/handleShow/showPost.php";
            $postDao = new PostDao();
            if($status == -1) {
                $resultFilter = $postDao->getAllPost();
            } else {
                $resultFilter = $postDao->getFilterPostByStatus($status);
            }
            showPost($resultFilter);
            break;
        case 'Tài khoản':
            include_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
            include_once PATH_ROOT_ADMIN."/view/handleShow/showAccount.php";
            $userDao = new UserDao();
            if($status == -1) {
                $resultFilter = $userDao->getAllUsers();
            } else {
                $resultFilter = $userDao->getFilterUsers($status);
            }
            showAccount($resultFilter);
            break;
        case 'Introduction':
            include_once PATH_ROOT_ADMIN."/DAO/AboutDao.php";
            include_once PATH_ROOT_ADMIN."/view/handleShow/showIntroduction.php";
            $aboutDao = new AboutDao();
            if($status == -1) {
                $resultFilter = $aboutDao->getAllIntro();
            } else {
                $resultFilter = $aboutDao->getFilterIntro($status);
            }
            showIntroduction($resultFilter);
            break;
        case 'Slogan':
            include_once PATH_ROOT_ADMIN."/DAO/SloganDao.php";
            include_once PATH_ROOT_ADMIN."/view/handleShow/showSlogan.php";
            $sloganDao = new SloganDao();
            if($status == -1) {
                $resultFilter = $sloganDao->getAllSlogan();
            } else {
                $resultFilter = $sloganDao->getFilterSlogan($status);
            }
            showSlogan($resultFilter);
            break;
        case 'Advertise':
            include_once PATH_ROOT_ADMIN."/DAO/AdvertiseDao.php";
            include_once PATH_ROOT_ADMIN."/view/handleShow/showAdvertise.php";
            $advertiseDao = new AdvertiseDao();
            if($status == -1) {
                $resultFilter = $advertiseDao->getAllAdvertise();
            } else {
                $resultFilter = $advertiseDao->getFilterAdvertise($status);
            }
            showAdvertise($resultFilter);
            break;
        case "Product":
            include_once PATH_ROOT_ADMIN."/DAO/ProductDao.php";
            include_once PATH_ROOT_ADMIN."/view/handleShow/showProduct.php";
            $productDao  = new ProductDao();
            if($status == -1) {
                $resultFilter = $productDao->getAllProduct();
            } else {
                $resultFilter = $productDao->getFilterProduct($status);
            }
            showProduct($resultFilter);
            break;
    }
    
?>