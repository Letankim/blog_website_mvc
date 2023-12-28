<link rel="stylesheet" href="./public/assets/css/product.css">
    <title>Sản phẩm</title>
</head>
<body>
    <div class="wrapper">
        <?php
            echo showHeaderNavigation();
        ?>
        <main>
            <div class="container header-search">
                <div class="left-header">
                    <a href=".">Trang chủ</a>
                    <span>/</span>
                    <a href="./product.html">Theme</a>
                </div>
            </div>
            <div class="container">
                <div class="wrapper-product">
                    <div class="row row-cols-2 row-cols-md-4 g-4">
                        <?php
                            if(count($allProduct) > 0) {
                                foreach($allProduct as $product) {
                                    echo '<div class="col">
                                    <div class="card">
                                        <iframe src="'.$product->getLink_demo().'" class="card-img-top" alt="Image product"></iframe>
                                        <div class="card-body box-link">
                                            <a target="_blank" href="'.$product->getLink_demo().'" class="product-item-link">Xem demo</a>
                                            <a target="_blank" href="'.$product->getLink_code().'" class="product-item-link">Code</a>
                                        </div>
                                    </div>
                                </div>';
                                }
                            } else {
                                echo "<img style='width: 100%;' src='./uploads/no-post.png'/>";
                            }
                        ?>
                    </div>
                    <nav class = "pagination-container">
                        <ul class="pagination">
                        <?php
                            $maxPage = 3;
                            if ($pageNumber > 1) {
                                $prePage = $pageNumber - 1;
                                echo '<li class="page-item">
                                        <a class="page-link" href="./product/page-' . $prePage . '.html" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>';
                            }
                            if ($pages <= $maxPage) {
                                for ($i = 1; $i <= $pages; $i++) {
                                    echo '<li class="page-item ' . ($pageNumber == $i ? 'active' : '') . '">
                                            <a class="page-link" href="./product/page-' . $i . '.html">' . $i . '</a>
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
                                            <a class="page-link" href="./product/page-' . $i . '.html">' . $i . '</a>
                                        </li>';
                                }
                                if ($end < $pages) {
                                    echo '<li class="page-item"><a class="page-link">...</a></li>';
                                }
                            }
                            if ($pageNumber < $pages) {
                                $nextPage = $pageNumber + 1;
                                echo '<li class="page-item">
                                        <a class="page-link" href="./product/page-' . $nextPage . '.html" aria-label="Next">
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
</html>