<?php
    function sendMailContact($name, $email, $phone, $message) {
        $mailContact = "<html>
        <head>
        <meta charset='utf-8'/>
        <title>Người dùng liên hệ</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.5;
                color: #333;
                font-size: 18px;
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
                margin: 3px 0px;
                font-weight: bold;
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
                <span>Người dùng liên hệ</span>
            </h1>
            <div class='main-content'>
            <p class='say-something'>Khách hàng: ".$name."</p>
            <p class='say-something'>Số điện thoại: ".$phone."</p>
            <p class='say-something'>Email: ".$email."</p>
            <p class='content'>
                Nội dung tin nhắn: ".$message."
            </p>
            <p class='say-something'>Hãy trả lời khách hàng</p>
            </div>
            <span class='sendby'>Được gửi bởi ".$name."</span>
        </body>
        </html>";
        return $mailContact;
    }
?>