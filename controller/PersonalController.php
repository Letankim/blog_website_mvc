<?php
require_once APP_ROOT."/DAO/UserDao.php";
require_once APP_ROOT."/Lib/Upload.php";
class PersonalController {
    public function personal() {
        $userDao = new UserDao();
        $id = $_SESSION['userId'];
        $currentUser = $userDao->getOneUser($id);
        if($currentUser == null) {
            header("Location: ./404.html");
        } else {
            include_once APP_ROOT."/view/PersonalView.php";
        }
        
    }
    public function updatePersonal() {
        $uploadLib = new Upload();
        $userDao = new UserDao();
        if(isset($_POST['update-information'])) {
            $id = $_SESSION['userId'];
            $name = $_POST['name'];
            $oldImg = $_POST['oldImgPath'];
            $email = $_POST['email'];
            $target_dir = "./uploads/";
            $img = $uploadLib->uploadImage($target_dir, $_FILES['avatar']);
            if($img == "") {
                $img = $oldImg;
            } else {
                $img = $target_dir.$img;
            }
            $result = $userDao->updateUserPersonal($id, $name, $email, $img);
            if($result == 1) {
                header("Location: ?act=personal&status=success");
            } else {
                header("Location: ?act=personal&status=fail");
            }
        } else {
            if(isset($_POST['update-password'])) {
                $idUser = $_SESSION['userId'];
                $oldPassword = $_POST['oldPassword'];
                $newPassword = $_POST['newPassword'];
                $currentUser = $userDao->getOneUser($idUser);
                $checkPass = password_verify($oldPassword, $currentUser->getPassword());
                $error_message="";
                $type_message = "success";
                if($checkPass && $currentUser->getUsername() != null) {
                    $result = $userDao->updateNewPass($idUser, password_hash($newPassword, PASSWORD_DEFAULT));
                    if($result == 1) {
                        $error_message = "Cập nhật mật khẩu thành công";
                        $type_message = "success";
                    } else {
                        $error_message = "Cập nhật mật khẩu thất bại";
                        $type_message = "fail";
                    }
                } else {
                    $error_message = "Mật khẩu cũ không hợp lệ";
                    $type_message = "fail";
                }
            }
            header("Location: ?act=personal&status=".$type_message."&message=".$error_message);
        }
    }
}
?>