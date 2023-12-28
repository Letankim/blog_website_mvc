<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Bài viết</title>
    <script>
        // filter by category ajax
        function postFilter() {
            let filterValue = $('#filter').val();
            if(filterValue != 0) {
                $.ajax({
                    url: './viewUser/components/filterPost.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        filterValue: filterValue
                    }
                }).done(function(result) {
                    $('.box_post').html(result);
                });
                document.querySelector('.page').innerHTML = "";
            } else {
                window.location.reload();
            }
        }
    </script>
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
                    <div class="box-filter">
                        <form action="./loc.html" method="post">
                            <select name="filterValue" class="filter-option">
                                <option value="-1" selected>Tất cả danh mục</option>
                                <?php
                                    foreach ($allNav as $itemNav) {
                                        $idNav = $itemNav->getId();
                                        $nameNav = $itemNav->getName();
                                        echo '<option value="'.$idNav.'">'.$nameNav.'</option>';
                                    }
                                ?>
                            </select>
                            <button class = "btn" type="submit" name = "filter">Lọc</button>
                        </form>
                    </div>
                    <div class="posts col-lg-12">
                        <div class="box-post">
                            <!-- render post from database  -->
                            <?=showPostInPage($pagePost)?>
                        </div>
                    </div>
                    <nav class = "pagination-container">
                        <ul class="pagination">
                        <?php
                            $maxPage = 3;
                            if ($pageNumber > 1) {
                                $prePage = $pageNumber - 1;
                                echo '<li class="page-item">
                                        <a class="page-link" href="./posts/page-' . $prePage . '.html" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>';
                            }
                            if ($pages <= $maxPage) {
                                for ($i = 1; $i <= $pages; $i++) {
                                    echo '<li class="page-item ' . ($pageNumber == $i ? 'active' : '') . '">
                                            <a class="page-link" href="./posts/page-' . $i . '.html">' . $i . '</a>
                                        </li>';
                                }
                            } else {
                                $start = max(min($pageNumber - floor($maxPage / 2), $pages - $maxPage + 1), 1);
                                $end = min($start + $maxPage - 1, $pages);

                                if ($start > 1) {
                                    echo '<li class="page-item"><a class="page-link">...</a></li>';
                                }

                                for ($i = $start; $i <= $end; $i++) {
                                    echo '<li class="page-item ' . ($pageNumber == $i ? 'active' : '') . '">
                                            <a class="page-link" href="./posts/page-' . $i . '.html">' . $i . '</a>
                                        </li>';
                                }
                                if ($end < $pages) {
                                    echo '<li class="page-item"><a class="page-link">...</a></li>';
                                }
                            }
                            if ($pageNumber < $pages) {
                                $nextPage = $pageNumber + 1;
                                echo '<li class="page-item">
                                        <a class="page-link" href="./posts/page-' . $nextPage . '.html" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>';
                            }
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