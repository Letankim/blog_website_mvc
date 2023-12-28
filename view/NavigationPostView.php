<?php
$createLink = new CreateLink();
    $idNav = $currentNavigation->getId();
    $nameNav = $currentNavigation->getName();
?>
<meta property="og:description" name="og:description" content="<?=$nameNav?>, game, liên quân, blog,website tin tức mới mỗi ngay">
<meta name="twitter:image:src" content="http://letankim.id.vn/uploads/logo.png">
<link rel="canonical" href="http://letankim.id.vn/danhmuc-<?=$idNav?>/<?=$createLink->vn_to_str($nameNav)?>.html" />
<meta property="og:site_name" name="og:site_name" content="<?=$nameNav?>" />
<meta property="og:type" name="og:type" content="article" />
<meta name="article_date_original" content="<?=date('Y-m-d')?>" />
<meta property="og:url" name="og:url" content="http://letankim.id.vn/danhmuc-<?=$idNav?>/<?=$createLink->vn_to_str($nameNav)?>.html" />
<meta property="og:image" name="og:image" content="http://letankim.id.vn/uploads/logo.png" />
    <title><?=$nameNav?></title>
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
                        <span>/</span>
                        <a href="./danhmuc-<?=$idNav?>/<?=$createLink->vn_to_str($nameNav)?>.html"><?=$nameNav?></a>
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
                    <div class="posts col-lg-12">
                        <div class="box-post">
                            <!-- render post from database  -->
                            <?=showPostInPage($pagePost)?>
                        </div>
                    </div>
                    <?php
                    if(count($pagePost) > 0) {
                    ?>
                    <nav class = "pagination-container">
                        <ul class="pagination">
                        <?php
                            $maxPage = 3;
                            if ($pageNumber > 1) {
                                $prePage = $pageNumber - 1;
                                echo '<li class="page-item">
                                        <a class="page-link" href="./danhmuc/'.$idNav.'/page-'.$prePage.'/'.$createLink->vn_to_str($nameNav).'.html" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>';
                            }
                            if ($pages <= $maxPage) {
                                for ($i = 1; $i <= $pages; $i++) {
                                    echo '<li class="page-item '.($pageNumber == $i ? 'active' : '').'">
                                            <a class="page-link" href="./danhmuc/'.$idNav.'/page-'.$i.'/'.$createLink->vn_to_str($nameNav).'.html">' . $i . '</a>
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
                                            <a class="page-link" href="./danhmuc/'.$idNav.'/page-'.$i.'/'.$createLink->vn_to_str($nameNav).'.html">' . $i . '</a>
                                        </li>';
                                }
                                if ($end < $pages) {
                                    echo '<li class="page-item"><a class="page-link">...</a></li>';
                                }
                            }
                            if ($pageNumber < $pages) {
                                $nextPage = $pageNumber + 1;
                                echo '<li class="page-item">
                                        <a class="page-link" href="./danhmuc/'.$idNav.'/page-'.$nextPage.'/'.$createLink->vn_to_str($nameNav).'.html" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>';
                            }
                            ?>
                        </ul>
                    </nav>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>
         <!-- footer -->
        <?php
            footer();
        ?>
    </div>
</body>
<script src="./upload/assets/js/app.js"></script>
</html>