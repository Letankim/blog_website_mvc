<?php
include_once APP_ROOT."/DAO/BannerDao.php";
include_once APP_ROOT."/DAO/SloganDao.php";
include_once APP_ROOT."/DAO/PostDao.php";
include_once APP_ROOT."/DAO/AdvertiseDao.php";
class HomeController {
    public function home() {
        $bannerDao = new BannerDao();
        $sloganDao  = new SloganDao();
        $postDao = new PostDao();
        $advertiseDao = new AdvertiseDao();
        $banners = $bannerDao->showBannerSlide();
        $slogan = $sloganDao->showTopSlogan();
        $pagePost = $postDao->allPostActiveMain();
        $featuredPost = $postDao->getPostFeatured();
        $viewLargePost = $postDao->getPostByView();
        $advertise = $advertiseDao->showAdvertise();
        include_once APP_ROOT."/view/HomeView.php";
    }

    public function sendContact() {
        include_once APP_ROOT."/mail/sendmail.php";
        include_once APP_ROOT."/mail/sendContact.php";
        if (isset($_POST["send-message"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $message = $_POST["message"];
            $formSend = sendMailContact($name, $email, $phone, $message);
            $resultMain = sendMail("Tin nhắn từ người dùng", $formSend, "letankim2003@gmail.com", $name);
            $status = "fail";
            if($resultMain) {
                $status = "success";
            }
            header("Location: ./?act=response&status=".$status);
        } else {
            header("Location: ./notFound.html");
        }
    }
}
?>