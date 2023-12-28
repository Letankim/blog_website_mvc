<?php
    $TYPE_USER = 0;
    include_once APP_ROOT."/DAO/UserDao.php";
    include_once APP_ROOT."/Lib/RandomUsername.php";
    require_once APP_ROOT."/Lib/ResetPassword.php";
    require_once APP_ROOT."/model/User.php";
    require_once APP_ROOT."/DAO/UserDao.php";
    require_once APP_ROOT.'/vendor/autoload.php';
    $error_message = "";
    // Login with google
    $client = new Google_Client();
    $client->setClientId(GOOGLE_APP_ID);
    $client->setClientSecret(GOOGLE_APP_SECRET);
    $client->setRedirectUri(GOOGLE_APP_CALLBACK_URL);
    $client->addScope("email");
    $client->addScope("profile");
    if (isset($_GET['code'])) {
        $resetPassword = new ResetPassword();
        $userDao = new UserDao();
        $date= date('Y/m/d H:i:s');
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $name =  $google_account_info->name;
        $avatar =  $google_account_info->picture;
        $isExistUserGoogle = $userDao->isExistGoogle($email);
        if($isExistUserGoogle != null && $isExistUserGoogle->getStatus() == 0) {
            $error_message = "Tài khoản của bạn đang bị tạm khóa.";
        } else {
            if($isExistUserGoogle != null) {
                $_SESSION['roleUser'] = 0;
                $_SESSION['username'] = $isExistUserGoogle->getUsername();
                $_SESSION["userId"] = $isExistUserGoogle->getId();
                $_SESSION["avatar"] = $isExistUserGoogle->getAvatar();
            } else {
                $username = "blog";
                $password = password_hash(implode("", $resetPassword->resetPassword(9)), PASSWORD_DEFAULT);
                $userWithGoogle = new User(null, $name, $username, $password, $email, $avatar, 1, $date, 1, 1);
                $idNewUser = $userDao->addUserSignupWithGg($userWithGoogle);
                $uniqueUsername = "bloguser".$idNewUser;
                $isUpdateUsername = $userDao->updateUsernameGoogle($uniqueUsername, $idNewUser);
                if($isUpdateUsername >= 1) {
                    $_SESSION['roleUser'] = 0;
                    $_SESSION['username'] = $uniqueUsername;
                    $_SESSION["userId"] = $idNewUser;
                    $_SESSION["avatar"] = $avatar;
                }
            }
            header("Location: ./trangchu.html");
        }
    }
    $userDao = new UserDao();
    $type_error = "error";
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $userDao->login($username);
        if($user !=  null) {
            $isValidLogin =  password_verify($password, $user->getPassword());
            if($isValidLogin && $user->getStatus() == 1) {
                if($user->getRole() == 0) {
                    $_SESSION['roleUser'] = $user->getRole();
                    $_SESSION['username'] = $user->getUsername();
                    $_SESSION["userId"] = $user->getId();
                    $_SESSION["avatar"] = $user->getAvatar();
                    header("Location: ./trangchu.html");
                } else {
                    $error_message = "Tài khoản này không đăng nhập được ở đây";
                } 
            }
            else if($isValidLogin && $user->getStatus() == 0) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./uploads/logo.png">
    <link rel="stylesheet" href="./public/assets/css/css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./public/assets/css/login.css">
    <link rel="stylesheet" href="./public/assets/css/form.css">
    <title>Đăng nhập</title>
    <style>
        .google-sign-in-button {
            cursor: pointer;
            transition: background-color .3s, box-shadow .3s;
            border: none;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
            color: #333;
            font-weight: 500;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
            background-color: #ffffff;
            background-repeat: no-repeat;
            background-position: 12px;
            padding-left: 10px;
        }
        .navigation-page.google-sign-in-button:hover {
            color: #333;
        }

        .google-sign-in-button:disabled {
            filter: grayscale(100%);
            background-color: #ebebeb;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
            cursor: not-allowed;
        }

    </style>
</head>
<body>
    <div class="wrapper-auth">
        <div class="box-auth">
            <h1 class="title-auth">Đăng nhập</h1>
            <form class = "form-input" method = "POST">
                <div class="group-input">
                    <div class="mb-3 form-group">
                        <input required type="text" id="username" class="form-control" id="name" name = "username" placeholder="Họ tên">
                        <span class = 'message_error'></span>
                    </div>
                    <div class="mb-3 form-group">
                        <input required type="password" id="password" class="form-control" id="password" name = "password"  placeholder="Mật khẩu">
                        <span class = 'message_error'></span>
                    </div>
                    <div class="mb-3">
                        <a href="quen-mat-khau.html" class="forget-password">Quên mật khẩu</a>
                    </div>
                </div>
                <div class="group-input">
                    <button name = "login" id="loginBtn" type="submit" class="btn btn-primary btn-submit-contact">Đăng nhập</button>
                    <div class="login-have-gg">
                        <a href="dang-ki.html" class="navigation-page">Đăng kí</a>
                        <a href="<?=$client->createAuthUrl()?>" class="navigation-page google-sign-in-button">Đăng nhập bằng Google</a>
                    </div>
                </div>
                <span class="show-message error"><?=$error_message?></span>
            </form>
        </div>
    </div>
    <script src="./public/assets/js/validator.js"></script>
    <script>
        const username = document.getElementById('username'),
            password = document.getElementById('password'),
            loginBtn = document.getElementById('loginBtn');
        const messageUsername = "Tên đăng nhập không được để trống và chứa dấu cách",
            messagePassword = "Mật khẩu không được để trống";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: username, message: messageUsername, regex: /^.{1,}$/, type: "text"},
            { element: password, message: messagePassword, regex: /^.{1,}$/, type: "text"},
        ];
        validation(inputsToValidateCheck, loginBtn);
    </script>
</body>
</html>