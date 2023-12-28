
<title>Trang chủ</title>
</head>
<body>
    <div class="wrapper">
        <?php
            echo showHeaderNavigation();
        ?>
        <main>
            <section class="container_main">
                <div class="banners">
                    <?php
                    if($slogan == null) {
                        $topSlogan = "Welcome to";
                        $bottomSlogan = "my website";
                    } else { 
                        $topSlogan = $slogan->getTopslogan();
                        $bottomSlogan = $slogan->getBottomslogan();
                    }
                    $numberOfBanner = count($banners);
                    if ($numberOfBanner >= 0) {
                        foreach($banners as $itemBanner) {
                            echo "<div class='banner-item'
                            style='background-image: linear-gradient(to bottom right, rgba(15, 22, 47, 0.4), rgba(173, 123, 103, 0.6)), url(./uploads/".$itemBanner->getImg().");'
                            >
                                <div class='slogan'>
                                    <h2>".$topSlogan."</h2>
                                    <p class='slogan-desc'>".$bottomSlogan."</p>
                                </div>
                            </div>";
                        }
                        $storeRandomArray = array("default-background.jpg-rw", "background_default_2.jpg", "background_default_3.jpg", "background_default_4.jpg", "background_default_5.jpg");
                        $randomBanner = 5 - $numberOfBanner;
                        for($i = 0; $i < $randomBanner; $i++) {
                            echo "<div class='banner-item'
                            style='background-image: linear-gradient(to bottom right, rgba(15, 22, 47, 0.4), rgba(173, 123, 103, 0.6)), url(./uploads/".$storeRandomArray[$i].");'
                            >
                                <div class='slogan'>
                                    <h2>".$topSlogan."</h2>
                                    <p class='slogan-desc'>".$bottomSlogan."</p>
                                </div>
                            </div>";
                        }
                    } 
                    ?>
                </div>
                <div class = "container">
                    <div class="main-content">
                        <div class="content-wrapper row">
                            <div class="posts col-lg-9">
                                <div class="title-content">
                                    <h2 class = "title">Bài viết</h2>
                                </div>
                                <div class="box-post">
                                    <!-- render post form database -->
                                    <?=showAllPost($pagePost)?>
                                </div>
                            </div>
                            <div class="right-content col-lg-3">
                                <div class="featured-post">
                                    <div class="title-content">
                                        <h2 class = "title">Bài viết nổi bật</h2>
                                    </div>
                                    <div class="box-featured-post row">
                                        <!-- render post featured -->
                                        <?=showPostFeatured($featuredPost)?>
                                    </div>
                                </div>
                                <div class="trending-post">
                                    <div class="title-content">
                                        <h2 class = "title">Bài viết được xem nhiều</h2>
                                    </div>
                                    <div class="box-featured-post row">
                                        <!-- render post have large view -->
                                        <?=showPostFeatured($viewLargePost)?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- footer -->
        <?php
            footer();
        ?>
        <!-- show advertise -->
        <?php
            if ($advertise != null) {
                addAdvertisement($advertise);
            }
        ?>
    </div>
    <script>
        // advertisement
        let boxAdver = document.querySelector('.box_advertisement'),
            boxOverlay = document.querySelector('.overlay_ad'),
            btnCloseAdver = document.querySelector('.box_btn_close');

        if (boxAdver) {
            setTimeout(function () {
                boxOverlay.classList.add('active');
                boxAdver.classList.add('active');
            },10000);

            boxOverlay.onclick = function () {
                boxOverlay.classList.remove('active');
                boxAdver.classList.remove('active');
            }
            btnCloseAdver.onclick = function () {
                boxOverlay.classList.remove('active');
                boxAdver.classList.remove('active');
            }
        }
        
    </script>
</body>
</html>