<?php
require_once PATH_ROOT_ADMIN."/DAO/SloganDao.php";
require_once PATH_ROOT."/model/Slogan.php";
class SloganAdminController
{
    public function adminSlogan()
    {
        $sloganDao  = new SloganDao();
        $allSlogan = $sloganDao->getAllSlogan();
        include_once PATH_ROOT_ADMIN."/view/sloganView.php";
    }

    public function adminAddSlogan()
    {
        $sloganDao  = new SloganDao();
        $topSlogan = $_POST['topSlogan'];
        $bottomSlogan = $_POST['bottomSlogan'];
        $status = $_POST['status'];
        $date = date('Y/m/d H:i:s');
        $slogan = new Slogan(null, $topSlogan, $bottomSlogan, $status, $date);
        $isDone = $sloganDao->addSlogan($slogan);
        $type = "fail";
        if ($isDone >= 1) {
            $type = "success";
        }
        header("location: ?act=slogan&status=".$type);
    }

    public function adminEditFormSlogan()
    {
        if (isset($_GET['id']) && $_GET['id']) {
            $sloganDao  = new SloganDao();
            $id = $_GET['id'];
            $currentSlogan = $sloganDao->getOneSlogan($id);
            $allSlogan = $sloganDao->getAllSlogan();
            include_once PATH_ROOT_ADMIN."/view/editForm/editFormSlogan.php";
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminUpdateSlogan()
    {
        if (isset($_POST['update-slogan']) && $_POST['update-slogan']) {
            $sloganDao = new SloganDao();
            $id = $_POST['id'];
            $topSlogan = $_POST['topSlogan'];
            $bottomSlogan = $_POST['bottomSlogan'];
            $status = $_POST['status'];
            $slogan = new Slogan($id, $topSlogan, $bottomSlogan, $status, null);
            $isDone = $sloganDao->updateSlogan($slogan);
            $type = "fail";
            if ($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=slogan&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminDeleteSlogan() {
        if(isset($_GET['id']) && $_GET['id']) {
            $sloganDao = new SloganDao();
            $id = $_GET['id'];
            $isDone = $sloganDao->deleteSlogan($id);
            $type = "fail";
            if ($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=slogan&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }
}
