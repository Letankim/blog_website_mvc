<?php
class AuthController {
    public function login() {
        include_once APP_ROOT."/view/LoginView.php";
    }
    public function logout() {

    }

    public function signup() {
        include_once APP_ROOT."/view/SignUpView.php";
    }

    public function forgetPassword() {
        include_once APP_ROOT."/view/ForgetPasswordView.php";
    }
}
?>