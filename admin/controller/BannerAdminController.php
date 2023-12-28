<?php
require_once PATH_ROOT_ADMIN."/DAO/BannerDao.php";
require_once PATH_ROOT."/model/Banner.php";
require_once PATH_ROOT."/Lib/Upload.php";
class BannerAdminController {
    public function adminBanner() {
        $bannerDao = new BannerDao();
        $upload = new Upload();
        $allBanner = $bannerDao->getAllBanner();
        include_once PATH_ROOT_ADMIN."/view/bannerView.php";
    }

    public function adminAddBanner() {
        $bannerDao = new BannerDao();
        $upload = new Upload();
        $status = $_POST["status"];
        $target_dir = "../uploads/";
        $img = $upload->uploadImage($target_dir, $_FILES["image"]);
        $date= date('Y/m/d H:i:s');
        $banner = new Banner(null, $img, $status, $date);
        $isDone  = $bannerDao->addBanner($banner);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: ?act=banner&status=".$type);
    }

    public function adminFormEditBanner() {
        if(isset($_GET["id"]) && $_GET["id"]) {
            $bannerDao = new BannerDao();
            $id = $_GET["id"];
            $currentBanner = $bannerDao->getOneBanner($id);
            if($currentBanner != null) {
                $allBanner = $bannerDao->getAllBanner();
                include_once PATH_ROOT_ADMIN."/view/editForm/editBannerForm.php";
            } else {
                header("Location: ?act=404");
            }
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminUpdateBanner() {
        if(isset($_POST["update-banner"]) && $_POST["update-banner"]) {
            $bannerDao = new BannerDao();
            $id = $_POST["id"];
            $status = $_POST["status"];
            $oldImg = $_POST["oldImg"];
            $upload = new Upload();
            $target_dir = "../uploads/";
            $img = $upload->uploadImage($target_dir, $_FILES["image"]);
            if($img == "") {
                $img = $oldImg;
            } 
            $banner = new Banner($id, $img, $status, null);
            $isDone  = $bannerDao->updateBanner($banner);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: ?act=banner&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminDeleteBanner() {
        if(isset($_GET['id']) && $_GET['id']) {
            $bannerDao = new BannerDao();
            $id = $_GET['id'];
            $isDone = $bannerDao->deleteBanner($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: ?act=banner&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }
}
?>