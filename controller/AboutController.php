<?php
require_once APP_ROOT."/DAO/AboutDao.php";
class AboutController {
    public function about() {
        $aboutDao = new AboutDao();
        $oneIntroduction = $aboutDao->getIntroShow();
        include_once APP_ROOT."/view/AboutView.php";
    }
}
?>