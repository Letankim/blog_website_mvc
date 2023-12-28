    <meta property="og:image" content="http://letankim.id.vn/uploads/<?=$currentPost->getImg()?>"/>
    <meta name="og:title" property="og:title" content="<?=$currentPost->getTitle()?>">
    <meta name="robots" content="index, archive"/>
    <meta property="og:description" name="og:description" content="<?=$currentPost->getTitle()?>">
    <meta name="keywords" content="<?=$currentPost->getTitle()?>">
    <meta name="author" content="<?=$userPosted->getName()?>">
    <meta name="twitter:image:src" content="http://letankim.id.vn/uploads/<?=$currentPost->getImg()?>">
    <link rel="canonical" href="http://letankim.id.vn/post-<?=$currentPost->getId()?>/<?=$createLink->vn_to_str($currentPost->getTitle())?>.html" />
    <meta property="og:title" name="og:title" content="<?=$currentPost->getTitle() ?>" />
    <meta property="og:site_name" name="og:site_name" content="Blog news" />
    <meta property="og:type" name="og:type" content="article" />
    <meta name="article_date_original" content="<?=$currentPost->getTime_post()?>" />
    <meta property="og:url" name="og:url" content="http://letankim.id.vn/post-<?=$currentPost->getId()?>/<?=$createLink->vn_to_str($currentPost->getTitle())?>.html" />
    <meta property="og:image" name="og:image" content="http://letankim.id.vn/uploads/<?=$currentPost->getImg()?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <link rel="stylesheet" href="./public/assets/css/itemPost.css">
    <link rel="stylesheet" href="./public/assets/css/toast.css">
    <title><?=$currentPost->getTitle() ?></title>
</head>
<body>
<div id="fb-root"></div>
    <div class="wrapper">
        <?php
            echo showHeaderNavigation();
        ?>
        <div id="toast">
            
        </div>
        <main>
            <?php
                $navigationDao = new NavigationDao();
                $currentNavigationPost = $navigationDao->getOneNav($currentPost->getId_nav());
                $nameNav = $currentNavigationPost->getName();
                $idNav = $currentNavigationPost->getId();
            ?>
            <div class="container header-search">
                <div class="left-header">
                    <a href=".">Trang chủ</a>
                    <span>/</span>
                    <a href="./danhmuc-<?=$idNav?>/<?=$createLink->vn_to_str($nameNav)?>.html"><?=$nameNav?></a>
                    <span>/</span>
                    <a href="./post-<?=$currentPost->getId()?>/<?=$createLink->vn_to_str($currentPost->getTitle())?>.html"><?=$currentPost->getTitle()?></a>
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
                <div class="row">
                    <div class="content-details-post col-lg-9">
                        <div class="container-details-post">
                            <div class="author" style = "padding: 0; margin-bottom: 20px;">
                                <div class="avatar">
                                    <?php
                                        $avatarUserPosted = $userPosted->getAvatar() == null ? "http://letankim.id.vn/uploads/default_avatar.jpg" : "./uploads/".$userPosted->getAvatar();
                                    ?>
                                    <img src="<?=$avatarUserPosted?>" alt="Avatar default">
                                </div>
                                <div class="author-information">
                                    <span class="name"><?=$userPosted->getName()?></span>
                                    <span class="time-post">Đăng lúc <?=$currentPost->getTime_post() ?></span>
                                </div>
                            </div>
                            <h1 class="title-post"><?=$currentPost->getTitle() ?></h1>
                            <div class="details-post">
                                <?=$currentPost->getContent() ?>
                            </div>
                            <div class="box-action">
                                <div class="group-action">
                                    <span><?=$currentPost->getView() + 1 ?></span>
                                    <span>Lượt xem</span>
                                </div>
                                <div class="group-action">
                                    <span class = "set-number-comment"><?=count($allCommentThisPost)?></span>
                                    <span>Bình luận</span>
                                </div>
                                <div class="group-action share-post">
                                    <a href="#" target="_blank" class="fa fa-facebook" title="Chia sẻ lên Facebook"></a>
                                    <a href="#" target="_blank" class="fa fa-twitter" title="Chia sẻ lên Twitter"></a>
                                    <a href="#" target="_blank" class="fa fa-linkedin" title="Chia sẻ lên Linkedin"></a>
                                    <a href="#" target="_blank" class="fa fa-reddit" title="Chia sẻ lên Reddit"></a>
                                    <a class="fa fa-link" onclick="copyCurrentLink(this)" title="Copy đường dẫn"></a>
                                </div>
                            </div>
                            <div class="box-see-relative-post">
                                <div class="relative-post">
                                    <span class="relative-post-title">Xem thêm: </span>
                                    <a href="./danhmuc-<?=$idNav?>/<?=$createLink->vn_to_str($nameNav)?>.html" class="relative-post-link">
                                    <?=$nameNav?>
                                </a>
                                </div>
                            </div>
                        </div>
                        <div class="box-comment">
                            <h2 class="title-comment">Bình luận</h2>
                            <div class="group-input-comment">
                                <?php
                                    $idUser = "";
                                    if (isset($_SESSION['roleUser']) && $_SESSION['roleUser'] == 0 && isset($_SESSION['username'])) {
                                        $idUser = $_SESSION['userId'];
                                        foreach ($allUser as $itemUser) {
                                            if ($idUser == $itemUser->getId()) {
                                                $avatar = $itemUser->getAvatar();
                                                if ($avatar == NULL) {
                                                    $avatar = "./uploads/default_avatar.jpg";
                                                }
                                                break;
                                            }
                                        }
                                        echo '<div class="comment-avatar">
                                                <img src="'.$avatar.'" alt="Avatar">
                                            </div>
                                            <div class="input-comment">
                                                <input required class = "content-comment" type="text" placeholder="Bình luận">
                                                <button class = "btn" onclick = "addComment('.$idUser.', '.$currentPost->getId().')">Bình luận</button>
                                            </div>';
                                    } else {
                                        echo '<a href="dang-nhap.html" class = "go-to-login">Hãy đăng nhập trước khi bình luận</a>';
                                    } 
                                ?>
                            </div>
                            <div class="box-all-commented">
                                <span class="count-comment"><i><?=count($allCommentThisPost)?></i> bình luận</span>
                                <ul class="list-comment">
                                    <?=showComment($allCommentThisPost, $allUser, $currentPost->getId(),$idUser);?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="related-post col-lg-3 right-content">
                        <div class="title-content">
                            <h2 class = "title">Bài viết liên quan</h2>
                        </div>
                        <div class="box-featured-post row">
                            <?=showPostFeatured($relatedPost)?>
                        </div>
                    </div>
                </div>
                <div class="preview-img">
                    <div class="box-close">
                        <i class='bx bxs-x-circle'></i>
                    </div>
                    <div class="overlay"></div>
                    <img src="" alt="">
                </div>
            </div>
        </main>
        <!-- footer -->
        <?php
            footer();
        ?>
<script src="./public/assets/js/itemPost.js"></script>
<script src="./public/assets/js/toast.js"></script>
<script src="./public/assets/js/Ajax/comment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"></script>
<script>
    hljs.highlightAll();
    // share social
    const link = encodeURI(window.location.href);
    const title = document.querySelector('title').innerText;
    const fb = document.querySelector('.fa-facebook');
    fb.href = `https://www.facebook.com/share.php?u=${link}`;

    const twitter = document.querySelector('.fa-twitter');
    twitter.href = `http://twitter.com/share?&url=${link}&text=${title}&hashtags=Programming`;

    const linkedIn = document.querySelector('.fa-linkedin');
    linkedIn.href = `https://www.linkedin.com/sharing/share-offsite/?url=${link}`;

    const reddit = document.querySelector('.fa-reddit');
    reddit.href = `http://www.reddit.com/submit?url=${link}&title=${title}`;

    const copyCurrentLink = (ele)=> {
        let dummy = document.createElement('input');
        document.body.appendChild(dummy);
        dummy.value = link;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
        ele.setAttribute('class', 'fa fa-check');
        setTimeout(function() {
            ele.setAttribute('class', 'fa fa-link');
        }, 1000);
    }
</script>
</body>
</html>