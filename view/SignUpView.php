<?php
    $TYPE_USER = 0;
    require_once APP_ROOT."/DAO/UserDao.php";
    require_once APP_ROOT."/model/User.php";
    $userDao = new UserDao();
    $error_message = "";
    $type_error = "success";
    if(isset($_POST['signUp'])) {
        $email = $_POST['Email'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $account = $userDao->checkUserName($username);
        if($account != null && $account->getUsername() != "") {
            $error_message = 'Tên đăng nhập đã tồn tại';
            $type_error = "error";
        } else {
            $zone_Asia_Ho_Chi_Minh = date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date= date('Y/m/d H:i:s');
            $user = new User(null, null,$username,password_hash($password, PASSWORD_DEFAULT), $email, null,1, $date, 0, 0);
            $userDao->addUserSignup($user);
            $error_message = 'Đăng kí tại khoản thành công';
            $type_error = "success";
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
    <title>Đăng kí</title>
</head>
<body>
    <div class="wrapper-auth">
        <div class="box-auth">
            <h1 class="title-auth">Đăng Kí</h1>
            <form class = "form-input" method = "POST">
                <div class="group-input">
                    <div class="mb-3 form-group">
                        <input type="text" class="form-control" id="name" name = "Username" placeholder="Tên đăng nhập">
                        <span class = 'message_error'></span>
                    </div>
                    <div class="mb-3 form-group">
                      <input type="email" class="form-control" id="email"  name = "Email"  placeholder="Email">
                      <span class = 'message_error'></span>
                    </div>
                    <div class="mb-3 form-group">
                      <input type="password" class="form-control" id="password" name = "Password"  placeholder="Mật khẩu">
                      <span class = 'message_error'></span>
                    </div>
                    <div class="mb-3 form-group">
                      <input type="password" class="form-control" id="confirm-password" name = "confirm-password"  placeholder="Xác nhân mật khẩu">
                      <span class = 'message_error'></span>
                    </div>
                </div>
                <div class="group-input">
                    <button name = "signUp" type="submit" class="btn btn-primary btn-submit-contact">Đăng kí</button>
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
        const name = document.getElementById('name'),
            email = document.getElementById('email'),
            password = document.getElementById('password'),
            submitBtn = document.querySelector('.btn.btn-primary');
        const messageName = "Username phải chứa ít nhất 5 kí tự và nhiều nhất 30 kí tự",
        messageEmail = "Email không hợp lệ",
        messagePassword = "Mật khẩu gồm ít nhất 8 kí tự không cách";
// array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidate = [
            { element: name, message: messageName, regex: /^[a-zA-Z0-9#@$&*!]{5,30}$/, type: "text"},
            { element: password, message: messagePassword, regex: /^[a-zA-Z0-9#@$&*!]{8,}$/, type: "text"},
            { element: email, message: messageEmail, regex: /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/, type: "text"},
        ];
        validation(inputsToValidate, submitBtn);
    </script>
</body>
</html>