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
        $allPosts = $postDao->allPostActiveMain();
        $chunked_posts = [];
        $chunkSize = 6;
        $length = count($allPosts);
        $start = 0;
        $index = 0;
        while ($start < $length && $index <= 2) {
            $chunk = array_slice($allPosts, $start, $chunkSize);
            $chunked_posts[] = $chunk;
            $start += $chunkSize;
            $index++;
            if($index == 1) {
                $chunkSize -=2;
            }
        }
        $featuredPost = $index >= 1 ? $chunked_posts[0] : [];
        $viewLargePost = $index >= 2 ? $chunked_posts[1] : [];
        $postNormal = $index >=3 ? $chunked_posts[2] : [];
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