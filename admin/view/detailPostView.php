<?php
    $navigationDao = new NavigationDao();
    $idNav = $currentPost->getId_nav();
    $title = $currentPost->getTitle();
    $content = $currentPost->getContent();
    $status = $currentPost->getStatus();
    $img = $currentPost->getImg();
    $shortDesc = $currentPost->getShortDesc();
    $priority = $currentPost->getPriority();
    $datePost = $currentPost->getTime_post();
    $dateUpdated = $currentPost->getTime_last_update();
    $view = $currentPost->getView();
    $currentNav = $navigationDao->getOneNav($idNav);
    $nameNav = $currentNav->getName();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Posts</h2>
    </div>
    <div class="container_main">
        <div class="show_list">
            <header><?=$title?></header>
            <!-- filter -->
            <div class="wrapper-post-detail">
                <div class="box-information-post">
                    <div class="group-info">
                        <img src="../uploads/<?=$img?>" alt="Ảnh mô tả">
                    </div>
                    <div class="group-info">
                        <label for="">
                            Danh mục: 
                        </label>
                        <p class="info-content">
                            <?=$nameNav?>
                        </p>
                    </div>
                    <div class="group-info">
                        <label for="">
                            Trạng thái: 
                        </label>
                        <p class="info-content">
                            <?= ($status == 1 ? "Hoạt động" : "Đã ẩn")?>
                        </p>
                    </div>
                    <div class="group-info">
                        <label for="">
                            Độ ưu tiên: 
                        </label>
                        <p class="info-content">
                            <?= ($priority == 1 ? "Ưu tiên" : "Bình thường")?>
                        </p>
                    </div>
                    <div class="group-info">
                        <label for="">
                            Ngày đăng: 
                        </label>
                        <p class="info-content">
                            <?= $datePost?>
                        </p>
                    </div>
                    <div class="group-info">
                        <label for="">
                            Ngày cập nhật: 
                        </label>
                        <p class="info-content">
                            <?= $dateUpdated?>
                        </p>
                    </div>
                    <div class="group-info">
                        <label for="">
                            Lượt xem: 
                        </label>
                        <p class="info-content">
                            <?= $view?>
                        </p>
                    </div>
                    <div class="group-info">
                        <label for="">
                            Mô tả ngắn: 
                        </label>
                        <p class="info-content">
                            <?= $shortDesc?>
                        </p>
                    </div>
                </div>
                <div class="box_detail">
                    <p class="box-detail-title">Chi tiết bài viết: </p>
                    <?=$content?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/languages/go.min.js"></script>
<script>
    var codeBlocks = document.querySelectorAll('pre code');
    for (var i = 0; i < codeBlocks.length; i++) {
        hljs.highlightBlock(codeBlocks[i]);
    }
</script>
