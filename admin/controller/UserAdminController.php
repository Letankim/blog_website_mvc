<?php
require_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
include_once PATH_ROOT_ADMIN."/view/handleShow/showAccount.php";
require_once PATH_ROOT."/model/User.php";
require_once PATH_ROOT."/Lib/Time.php";
class UserAdminController {
    
    public function adminUser() {
        $userDao = new UserDao();
        $allUser = $userDao->getAllUsers();
        include_once PATH_ROOT_ADMIN."/view/userView.php";
    }

    public function adminAddUser() {
        $userDao = new UserDao();
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        $date= getCurrentTime();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $user = new User(null, $name,$username, $password, $email, null, $status, $date, $role, 0);
        $isExistUsername = $userDao->checkUserName($username);
        if($isExistUsername != null) {
            header("location: ?act=account&status=fail&message=Username này đã tồn tại");
        } else {
            $isDone = $userDao->addUser($user);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=account&status=".$type);
        }
    }

    public function adminEditFormUser() {
        if(isset($_GET['id']) && $_GET['id']) {
            $userDao = new UserDao();
            $id = $_GET['id'];
            $currentUser = $userDao->getOneUser($id);
            if($currentUser == null) {
                header("Location: ?act=404");
            } else {
                $allUser = $userDao->getAllUsers();
                include PATH_ROOT_ADMIN."/view/editForm/editUserForm.php";
            }
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminUpdateUser() {
        if(isset($_POST['update-user']) && $_POST['update-user']) {
            $userDao = new UserDao();
            $id = $_POST['id'];
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $oldPassword = $_POST['oldPassword'];
            $role = $_POST['role'];
            $status = $_POST['status'];
            if($password != "") {
                $password = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $password = $oldPassword;
            }
            $user = new User($id, $name,$username, $password, $email, null, $status, null, $role, 0);
            $isDone = $userDao->updateUser($user);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=account&status=".$type);
        }
    }

    public function adminDeleteUser() {
        if(isset($_GET['id']) && $_GET['id']) {
            $userDao = new UserDao();
            $id = $_GET['id'];
            $isDone =  $userDao->deleteUser($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=account&status=".$type);
        } else {
            header("location: ?act=404");
        }
    }
}
?>