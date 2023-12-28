<?php
    session_start();
    ob_start();
    $TYPE_USER = 1;
    include_once "../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
    $error_message = "";
    if(isset($_POST['login']) && $_POST['login']) {
        $userDao = new UserDao();
        $username = $_POST['username'];
        $password = $_POST['passwordInput'];
        $user = $userDao->login($username);
        if($user != null && $user->getUsername() != "") {
            $isValidLogin =  password_verify($password, $user->getPassword());
            if($isValidLogin && $user->getStatus() == 1) {
                if($user->getRole() == 1) {
                    $_SESSION['roleAdmin'] = $user->getRole();
                    $_SESSION['usernameAdmin'] = $user->getUsername();
                    $_SESSION['idAdmin'] = $user->getId();
                    $avatar = "avatar-default.jpg";
                    if($user->getAvatar() != null) {
                        $avatar = $user->getAvatar();
                    }
                    $_SESSION['avatarAdmin'] = $avatar;
                    header("Location: ../index.php?act=trangchu");
                } else {
                    $error_message = "Tài khoản này không được phép đăng nhập ở đây.";
                }
            } else if($isValidLogin && $user->getStatus() == 0) {
                $error_message = "Tài khoản của bạn đang bị tạm khóa.";
            } else {
                $error_message = "Tài khoản hoặc mật khẩu không chính xác.";
            }
        } else {
            $error_message = "Tài khoản hoặc mật khẩu không chính xác.";
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
    <title>Login</title>
</head>
<body>
    <div class="container_app">
        <div class="wrapper">
            <h2 class = "title">Login</h2>
            <div class="body_login">
                <form action="" method="post">
                    <div class="box_input">
                        <i class='bx bxs-user' ></i>
                        <input required type="text" name="username" class = "input" placeholder="Enter your username">
                    </div>
                    <div class="box_input box_input_pass active">
                        <i class='bx bxs-lock' ></i>
                        <input required type="password" name="passwordInput" class = "input input_pass" placeholder="Enter your password">
                        <i class='bx bx-show interact' ></i>
                        <i class='bx bx-hide interact' ></i>
                    </div>
                    <a href="./forestPass.php" class="forest_pass">Forgot Password</a>
                    <input type="submit" value="Login" name = "login" class = "submit">
                    <span style="color:#ffffff; display: block; margin-top: 5px; font-weight: bold;"><?=$error_message?></span>
                </form>
            </div>
        </div>
    </div>
</body>
</html>