<?php
    function sendMailForgetPassword($username, $newPassword) {
        $mailForgetPassword = "<html>
        <head>
        <meta charset='utf-8'/>
        <title>Cấp lại mật khẩu</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 16px;
                line-height: 1.5;
                color: #333;
            }
            .title {
                font-size: 24px;
                font-weight: bold;
                text-transform: uppercase;
                color: #01b28c;
                margin-top: 0;
                margin-bottom: 20px;
                text-align: center;
            }
            .say-something {
                margin: 5px 0px;
            }
            .main-content {
                padding: 0px 20px;
            }
            .content {
                margin: 5px 0px;
            }
            .sendby {
                padding: 0px 20px;
                font-style: italic;
                color: #007bff;
                display: block;
                margin-bottom: 5px;
            }
            </style>
        </head>
        <body>
            <h1 class='title'>
                <span>Cấp lại mật khẩu</span>
            </h1>
            <div class='main-content'>
            <p class='say-something' style='font-style: italic;'>Xin chào ".$username.",</p>
            <p class='content'>
                Cảm ơn bạn đã sử dụng website của chúng tôi. 
                Mật khẩu mới của bạn là <span style='color:#fff;background-color: #01b28c'>".$newPassword."</span>
                . Hãy đăng nhập lại và tiếp tục trải nghiệm nhé.
            </p>
            <p class='say-something'>Lần nữa cảm ơn bạn</p>
            </div>
            <span class='sendby'>Được gửi bởi hệ thống tự động</span>
            <img style='padding-left: 20px;' src='https://media.istockphoto.com/id/1271311350/vector/thank-you-ink-brush-vector-lettering-thank-you-modern-phrase-handwritten-vector-calligraphy.jpg?s=612x612&w=0&k=20&c=k50bI-VIGLno48xtby-RWr4TcFNUp-K38VMkn59_Cfw=' alt='thankyou'>
        </body>
        </html>";
        return $mailForgetPassword;
    }
?>