<?php
    $TYPE_USER = 2;
    require_once "./DAO/UserDao.php";
    require_once "./Lib/ResetPassword.php";
    require_once "./model/User.php";
    include_once "./mail/sendmail.php";
    include_once "./mail/sendForget.php";
    $userDao = new UserDao();
    $resetPassword = new ResetPassword();
    $error_message = "";
    $type_error = "";
    if(isset($_POST['resetPassword'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $user = $userDao->forestPassword($email, $username);
        if($user != null && $user->getUsername() != "") {
            $id = $user->getId();
            $username =  $user->getUsername();
            $email = $user->getEmail();
            $newPass = implode("", $resetPassword->resetPassword(9));
            $message = sendMailForgetPassword($username, $newPass);
            $userDao->updateNewPass($id, password_hash($newPass, PASSWORD_DEFAULT));
            $resultReset = sendmail("Cấp lại mật khẩu", $message, $email, $username);
            if($resultReset) {
                $type_error = "success";
                $error_message = 'Cấp lại mật khẩu thành công. Vui lòng check mail.';
            } else {
                $type_error = "error";
                $error_message = 'Hệ thống đang bận vui lòng thử lại.';
            }
        } else {
            $type_error = "error";
            $error_message = 'Không tìn thấy tài khoản trong hệ thống.';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./uploads/logo.png">
    <link rel="stylesheet" href="./public/assets/css/css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./public/assets/css/login.css">
    <link rel="stylesheet" href="./public/assets/css/form.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper-auth">
        <div class="box-auth">
            <h1 class="title-auth">Quên mật khẩu</h1>
            <form class = "form-input" method = "POST">
                <div class="group-input">
                    <div class="mb-3 form-group">
                        <input required type="text" class="form-control" id="username" name = "username" placeholder="Username">
                        <span class = 'message_error'></span>
                    </div>
                    <div class="mb-3 form-group">
                        <input required type="email" class="form-control" id="email"  name = "email"  placeholder="Email">
                        <span class="message_error"></span>
                    </div>
                </div>
                <div class="group-input">
                    <button id="forgetBtn" name = "resetPassword" type="submit" class="btn btn-primary btn-submit-contact">Cấp lại mật khẩu</button>
                    <div class="box-navigation-page">
                        <span>or</span>
                        <a href="dang-nhap.html" class="navigation-page">Đăng nhập</a>
                    </div>
                </div>
                <span class="show-message <?=$type_error?>"><?=$error_message?></span>
            </form>
        </div>
    </div>
    <script src="./public/assets/js/validator.js"></script>
    <script>
        const username = document.getElementById('username'),
            email = document.getElementById('email'),
            forgetBtn = document.getElementById('forgetBtn');
        const messageUsername = "Tên đăng nhập không được để trống và chứa dấu cách",
            messageEmail = "Email không hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: username, message: messageUsername, regex: /^.{1,}$/, type: "text"},
            { element: email, message: messageEmail, regex: /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/, type: "text"},
        ];
        validation(inputsToValidateCheck, forgetBtn);
    </script>
</body>
</html>