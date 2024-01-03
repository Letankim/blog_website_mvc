<?php
require_once PATH_ROOT_ADMIN."/DAO/AboutDao.php";
require_once PATH_ROOT."/model/Introduction.php";
include_once PATH_ROOT_ADMIN."/view/handleShow/showIntroduction.php";
require_once PATH_ROOT."/Lib/Upload.php";
require_once PATH_ROOT."/Lib/Time.php";
class AboutAdminController {
    public function adminAbout() {
        $aboutDao = new AboutDao();
        $allIntro =  $aboutDao->getAllIntro();
        include_once PATH_ROOT_ADMIN."/view/aboutView.php";
    }

    public function adminAddAbout() {
        $upload = new Upload();
        $aboutDao = new AboutDao();
        $content = $_POST['content'];
        $status = $_POST['status'];
        $target_dir = "../uploads/";
        $img = $upload->uploadImage($target_dir, $_FILES['image']);
        $date= getCurrentTime();
        $about = new Introduction(null, $img, $content, $status, $date);
        $isDone = $aboutDao->addIntro($about);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("location: ?act=about&status=".$type);
    }

    public function adminEditFormAbout() {
        if(isset($_GET['id']) && $_GET['id']) {
            $aboutDao = new AboutDao();
            $id = $_GET['id'];
            $currentIntroduction = $aboutDao->getOneIntro($id);
            if($currentIntroduction == null) {
                header("location: ?act=404");
            } else {
                $allIntro = $aboutDao->getAllIntro();
                include_once PATH_ROOT_ADMIN."/view/editForm/editIntroForm.php";
            }
        } else {
            header("location: ?act=404");
        }
    }

    public function adminUpdateAbout() {
        if(isset($_POST["update-about"]) && $_POST["update-about"]) {
            $aboutDao = new AboutDao();
            $upload = new Upload();
            $id = $_POST["id"];
            $content = $_POST["content"];
            $oldImg = $_POST["oldImg"];
            $status = $_POST["status"];
            $target_dir = "../uploads/";
            $img = $upload->uploadImage($target_dir, $_FILES['image']);
            if($img == "") {
                $img = $oldImg;
            }
            $about = new Introduction($id, $img, $content, $status, null);
            $isDone = $aboutDao->updateIntro($about);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=about&status=".$type);
        } else {
            header("location: ?act=404");
        }
    }

    public function adminDeleteAbout() {
        if(isset($_GET["id"]) && $_GET["id"]) {
            $aboutDao = new AboutDao();
            $id = $_GET["id"];
            $isDone = $aboutDao->deleteIntro($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=about&status=".$type);
        } else {
            header("location: ?act=404");
        }
    }
}
?>