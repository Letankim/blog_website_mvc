<?php
    session_start();
    ob_start();
    $TYPE_USER = 1;
    include_once "../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
    include_once PATH_ROOT."/Lib/ResetPassword.php";
    include_once PATH_ROOT."/mail/sendmail.php";
    include_once PATH_ROOT."/mail/sendForget.php";
    $error_message = "";
    if(isset($_POST['forgetPassword']) && $_POST['forgetPassword']) {
        $userDao = new UserDao();
        $resetPassword = new ResetPassword();
        $email = $_POST['email'];
        $username = $_POST['username'];
        $user = $userDao->forestPass($email, $username);
        if($user != null && $user->getUsername() != "" && $user->getStatus() == 1) {
            if($user->getRole() == 1) {
                $id = $user->getId();
                $username = $user->getUsername();
                $email = $user->getEmail();
                $newPass = implode("", $resetPassword->resetPassword(9));
                $message = sendMailForgetPassword($username, $newPass);
                $isDone = $userDao->updateNewPass($id, password_hash($newPass, PASSWORD_DEFAULT));
                $resultReset = false;
                if($isDone >= 1) {
                    $resultReset = sendmail("Cấp lại mật khẩu trang admin", $message, $email, $username);
                }
                if($resultReset) {
                    $error_message = '<p style="color: #0aff58; margin-top: 5px; font-weight: bold;">Cấp lại mật khẩu thành công. Kiểm tra email.</p>';
                } else {
                    $error_message = '<p style="color: #ffffff; margin-top: 5px; font-weight: bold;">Hệ thống đang bận. Thử lại</p>';
                }
            } else {
                $error_message = '<p style="color: #ffffff; margin-top: 5px; font-weight: bold;">Tài khoản này không được cấp lại tại đây.</p>';
            }
        } else {
            $error_message = '<p style="color: #ffffff; margin-top: 5px; font-weight: bold;">Không tồn tại tài khoản hoặc đang bị khóa</p>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/login.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="container_app">
        <div class="wrapper">
            <h2 class = "title">Reset password</h2>
            <div class="body_login">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="box_input">
                        <i class='bx bx-envelope' ></i>
                        <input required type="text" name="email" class = "input" placeholder="Enter your email">
                    </div>
                    <div class="box_input">
                        <i class='bx bxs-user' ></i>
                        <input required type="text" name="username" class = "input" placeholder="Enter your username">
                    </div>
                    <input type="submit" value="Reset password" name = "forgetPassword" class = "submit">
                    <?php echo $error_message?>
                    <a href="./login.php" class="page_login">
                        <i class='bx bx-left-arrow-alt' ></i>
                        [Go to login]
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>