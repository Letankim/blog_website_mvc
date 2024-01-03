
    <title><?=$titleHead?></title>
</head>
<body>
        <?php
            echo showHeaderNavigation();
        ?>
        <main>
            <div class="container_main">
                <div class="container header-search">
                    <div class="left-header">
                        <a href=".">Trang chủ</a>
                        <span>/</span>
                        <a href="./post.html">Bài viết</a>
                    </div>
                    <div class="search-box">
                        <form class="input-group mb-3" method="post" action="./search.html">
                            <input name="keyword" type="text" class="form-control" placeholder="Tìm kiếm">
                            <div class="input-group-append">
                            <button name="search" type="submit" class="btn btn-outline-secondary" type="button">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container">
                    <h2 style="margin-top: 10px;" class="title_search">
                        <?=$messageTitle?>
                    </h2>
                    <div class="posts col-lg-12">
                        <div class="box-post">
                            <!-- render post from database  -->
                            <?=showPostInPage($resultSearch)?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
         <!-- footer -->
         <?php
            footer();
        ?>
</body>
</html>