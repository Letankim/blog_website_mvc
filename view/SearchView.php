
    <title>Tìm kiếm</title>
</head>
<body>
    <div class="wrapper">
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
                    <h2 style="margin-top: 10px;" class="title_search">Kết quả tìm kiếm cho "<?=$keyWord?>" có <?=count($resultSearch)?> kết quả phù hợp</h2>
                    <div class="posts col-lg-12">
                        <div class="box-post">
                            <!-- render post from database  -->
                            <?=showPostInPage($resultSearch)?>
                        </div>
                    </div>
                    <nav class = "pagination-container">
                        <ul class="pagination">
                        <?php
                            // if($pageNumber > 1) {
                            //     $prePage = $pageNumber - 1;
                            //     echo '
                            //     <li class="page-item">
                            //         <a class="page-link" href="./posts/page-'.$prePage.'.html" aria-label="Previous">
                            //             <span aria-hidden="true">&laquo;</span>
                            //         </a>
                            //     </li>';
                            // }
                        ?>
                        <?php
                            // if($pages <= 1) {
                            //     echo '<li class="page-item"><a class="page-link" href="./posts/page-1.html">1</a></li>';
                            // } else {
                            //     for($i = 1; $i <= $pages; $i++) {
                            //         if($pageNumber == $i) {
                            //             echo '<li class="page-item"><a style="background: yellow" class="page-link" href="./posts/page-'.$i.'.html">'.$i.'</a></li>';
                            //         } else {
                            //             echo '<li class="page-item"><a class="page-link" href="./posts/page-'.$i.'.html">'.$i.'</a></li>';
                            //         }
                            //     }
                            // }
                        ?>
                        <?php
                            // if($pageNumber < $pages) {
                            //     $nextPage = $pageNumber + 1;
                            //     echo '
                            //     <li class="page-item">
                            //         <a class="page-link" href="./posts/page-'.$nextPage.'.html" aria-label="Next">
                            //             <span aria-hidden="true">&raquo;</span>
                            //         </a>
                            //     </li>';
                            // }
                        ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
         <!-- footer -->
         <?php
            footer();
        ?>
    </div>
</body>
</html>