<?php
require_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
require_once PATH_ROOT."/model/User.php";
require_once PATH_ROOT."/Lib/Upload.php";
class PersonalAdminController {
    public function adminPersonal() {
        if(isset($_SESSION['idAdmin'])) {
            $idAdmin = $_SESSION['idAdmin'];
            $userDao = new UserDao();
            $currentUser = $userDao->getOneUser($idAdmin);
            include_once PATH_ROOT_ADMIN."/view/personalAdminView.php";
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminUpdatePersonal() {
        $upload = new Upload();
        $userDao = new UserDao();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($password != "") {
            $password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $password = $_POST['oldPassword'];
        }
        $target_dir = "../uploads/";
        $img = $upload->uploadImage($target_dir, $_FILES["image"]);
        if($img == "") {
            $img = $_POST['oldImg'];
        }
        $user = new User($id, $name, $username, $password, $email, $img, 1, null, 1, 0);
        $isDone = $userDao->updateAdminPersonal($user);
        $type = "fail";
        if($isDone >= 1) {
            $type= "success";
            $_SESSION['avatarAdmin'] = $img;
        }
        header("Location: ?act=trangchu&status=".$type);
    }
}
?>