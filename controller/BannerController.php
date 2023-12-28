<?php
include_once APP_ROOT."/DAO/BannerDao.php";
class BannerController {
    public function getAllBanner() {
        $bannerDao = new BannerDao();
        $banners = $bannerDao->showBannerSlide();
    }
}
?>