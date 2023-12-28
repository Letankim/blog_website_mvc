<?php
    include_once "../../config/config.php";
    $type = $_POST['type'];
    $data = $_POST['data'];
    $isAll = $_POST['isAll'];
    switch ($type) {
        case 'navigation':
            require_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
            $navigationDao = new NavigationDao();
            if($isAll =="true") {
                $navigationDao->deleteAllNav();
            } else {
                foreach($data as $item) {
                    $navigationDao->deleteNav($item);
                }
            }
            break;
        case 'banner':
            require_once PATH_ROOT_ADMIN."/DAO/BannerDao.php";
            $bannerDao = new BannerDao();
            if($isAll =="true") {
                $bannerDao->deleteAllBanner();
            } else {
                foreach($data as $item) {
                    $bannerDao->deleteBanner($item);
                }
            }
            break;
        case 'post':
            require_once PATH_ROOT_ADMIN."/DAO/PostDao.php";
            $postDao = new PostDao();
            if($isAll =="true") {
                $postDao->deleteAllPost();
            } else {
                foreach($data as $item) {
                    $postDao->deletePost($item);
                }
            }
            break;
        case 'advertise':
            require_once PATH_ROOT_ADMIN."/DAO/AdvertiseDao.php";
            $advertiseDao = new AdvertiseDao();
            if($isAll =="true") {
                $advertiseDao->deleteAllAdvertise();
            } else {
                foreach($data as $item) {
                    $advertiseDao->deleteAdvertise($item);
                }
            }
            break;
        case 'slogan':
            require_once PATH_ROOT_ADMIN."/DAO/SloganDao.php";
            $sloganDao = new SloganDao();
            if($isAll =="true") {
                $sloganDao->deleteAllSlogan();
            } else {
                foreach($data as $item) {
                    $sloganDao->deleteSlogan($item);
                }
            }
            break;
        case 'product':
            require_once PATH_ROOT_ADMIN."/DAO/ProductDao.php";
            $productDao = new ProductDao();
            if($isAll =="true") {
                $productDao->deleteAllProduct();
            } else {
                foreach($data as $item) {
                    $productDao->deleteProduct($item);
                }
            }
            break;
        case 'introduction':
            require_once PATH_ROOT_ADMIN."/DAO/AboutDao.php";
            $aboutDao = new AboutDao();
            if($isAll =="true") {
                $aboutDao->deleteAllIntro();
            } else {
                foreach($data as $item) {
                    $aboutDao->deleteIntro($item);
                }
            }
            break;
    }
?>