<meta property="og:image" content="http://letankim.id.vn/uploads/logo.png"/>
<meta name="og:title" property="og:title" content="website tin tức mới mỗi ngay">
<meta name="robots" content="index, archive"/>
<meta property="og:description" name="og:description" content="game, liên quân, blog,website tin tức mới mỗi ngay">
<meta name="twitter:image:src" content="http://letankim.id.vn/uploads/logo.png">
<link rel="canonical" href="http://letankim.id.vn/" />
<meta property="og:site_name" name="og:site_name" content="Blog news" />
<meta property="og:type" name="og:type" content="article" />
<meta name="article_date_original" content="<?=date('Y-m-d')?>" />
<meta property="og:url" name="og:url" content="http://letankim.id.vn/" />
<meta property="og:image" name="og:image" content="http://letankim.id.vn/uploads/logo.png" />
<link rel="stylesheet" href="./public/assets/css/aboutUs.css">
    <title>Về tôi</title>
</head>
<body>
    <div class="wrapper">
        <?php
            echo showHeaderNavigation();
        ?>
        <main>
            <?php
                $introductionContent = "";
                $img = "";
                if($oneIntroduction != null) {
                    $img = $oneIntroduction->getImg();
                    $introductionContent = $oneIntroduction->getContent();
                }
            ?>
            <div class="introduction">
                <div class="content-introduction container">
                    <div class="box-img">
                        <img src="./uploads/<?=$img?>" alt="Introduction image">
                    </div>
                    <div class="box-content">
                        <h1 class="introduction-title">Về <br>chúng tôi</h1>
                        <p><?=$introductionContent?></p>
                    </div>
                </div>
            </div>
        </main>
         <!-- footer -->
        <?php
            footer();
        ?>
    </div>
    <script src="./public/assets/js/app.js"></script>
</body>
</html>