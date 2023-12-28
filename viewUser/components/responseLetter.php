    <title>Gửi tin nhắn</title>
</head>
<body>
    <?=showHeaderNavigation()?>
    <main>
        <style>
            .wrapper-letter {
                text-align: center;
                margin: 10px 0px;
            }
            .letter-title {
                color: #ad7b67;
                text-align: center;
                margin: 0px;
                padding-top: 10px;
            }
            .wrapper-letter img {
                width: 60%;
            }
        </style>
        <div class="container">
            <div class="wrapper-letter">
                <?php
                $img = "./uploads/base/thankyou.png";
                $textMessage = "Cảm ơn bạn đã liên hệ với tôi. Tôi đã nhận được tin nhắn của bạn. Sẽ trả lời cho bạn trong thời gian sớm nhất.";
                if(isset($_GET['status']) && $_GET['status'] == 'fail') {
                    $img = "./uploads/base/send-contact-error.jpg";
                    $textMessage = "Xin lỗi hệ thống đang bận. Vui lòng gửi lại tin nhắn.";
                }
                ?>
                <img src="<?=$img?>" alt="Thank you letter">
                <h3 class = "letter-title"><?=$textMessage?></h3>
            </div>
        </div>
    </main>
     <!-- footer -->
    <?php
        footer();
    ?>
    <script src="./assets/js/app.js"></script>
</body>
</html>