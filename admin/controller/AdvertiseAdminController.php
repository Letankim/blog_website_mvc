<?php
require_once PATH_ROOT_ADMIN."/DAO/AdvertiseDao.php";
require_once PATH_ROOT."/model/Advertise.php";
include_once PATH_ROOT_ADMIN."/view/handleShow/showAdvertise.php";
require_once PATH_ROOT."/Lib/Upload.php";
require_once PATH_ROOT."/Lib/Time.php";
class AdvertiseAdminController {
    public function adminAdvertise() {
        $advertiseDao = new AdvertiseDao();
        $allAdver = $advertiseDao->getAllAdvertise();
        include_once PATH_ROOT_ADMIN."/view/advertiseView.php";
    }

    public function adminAddAdvertise() {
        $advertiseDao = new AdvertiseDao();
        $upload = new Upload();
        $name = $_POST['name'];
        $link = $_POST['link'];
        $status = $_POST['status'];
        $target_dir = "../uploads/";
        $img =  $upload->uploadImage($target_dir, $_FILES['image']);
        $date= getCurrentTime();
        $advertise = new Advertise(null, $name, $link, $img, $status, $date);
        $isDone = $advertiseDao->addAdvertise($advertise);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: ?act=advertise&status=".$type);
    }

    public function adminEditFormAdvertise() {
        if(isset($_GET['id']) && $_GET['id']) {
            $advertiseDao = new AdvertiseDao();
            $id = $_GET['id'];
            $currentAdvertise = $advertiseDao->getOneAdvertise($id);
            $allAdver = $advertiseDao->getAllAdvertise();
            include_once PATH_ROOT_ADMIN."/view/editForm/editAdverForm.php";
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminUpdateAdvertise() {
        if(isset($_POST['update-advertise']) && $_POST['update-advertise']) {
            $advertiseDao = new AdvertiseDao();
            $upload = new Upload();
            $name = $_POST['name'];
            $link = $_POST['link'];
            $status = $_POST['status'];
            $id = $_POST['id'];
            $oldImg =  $_POST['oldImg'];
            $target_dir = "../uploads/";
            $img =  $upload->uploadImage($target_dir, $_FILES['image']);
            if($img == "") {
                $img = $oldImg;
            }
            $advertise = new Advertise($id, $name, $link, $img, $status, null);
            $isDone = $advertiseDao->updateAdvertise($advertise);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: ?act=advertise&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminDeleteAdvertise() {
        if(isset($_GET['id']) && $_GET['id']) {
            $advertiseDao = new AdvertiseDao();
            $id = $_GET['id'];
            $isDone = $advertiseDao->deleteAdvertise($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: ?act=advertise&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }
}
?>