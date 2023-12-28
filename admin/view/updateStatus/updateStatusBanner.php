<?php
    require_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/Dao/BannerDao.php";
    include_once PATH_ROOT_ADMIN."/view/handleShow/showBanner.php";
    $bannerDao = new BannerDao();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    $bannerDao->updateStatusBanner($id, $status);
    $allBanner = $bannerDao->getAllBanner();
    showBanner($allBanner);
?>