<div class="main_app">
    <div class="header_app">
        <h2 class="title">Thống kê</h2>
    </div>
    <div class="container_main" style="margin-top: 10px;">
        <div class="dashboard">
            <ul class="list_dash">
                <li class="item_dash">
                    <i class='bx bx-navigation'></i>
                    <span class="number"><?=count($allNav)?></span>
                    <span class="nav_title">Navigation</span>
                </li>
                <li class="item_dash">
                    <i class='bx bxs-edit-alt' ></i>
                    <span class="number"><?=count($allPost)?></span>
                    <span class="nav_title">Bài đăng</span>
                </li>
                <li class="item_dash">
                    <i class='bx bxs-user-detail' ></i>
                    <span class="number"><?=count($allUser)?></span>
                    <span class="nav_title">Người dùng</span>
                </li>
                <li class="item_dash">
                    <i class='bx bx-image-add' ></i>
                    <span class="number"><?=count($allBanner)?></span>
                    <span class="nav_title">Banner</span>
                </li>
            </ul>
        </div>
        <div class="dashboard-comment">
            <ul class="list_dash-comment">
                <h3>New comment</h3>
                <?php
                    if(count($allNewComment) > 0){
                        foreach ($allNewComment as $comment) {
                            $idPost = $comment->getIdPost();
                            $time = $comment->getTime_comment();
                            $username = $userDao->getOneUser($comment->getIdUser())->getUsername();
                ?>
                        <li class="item_dash-comment">
                            <a href="?act=commentPost&id=<?=$idPost?>" class="item-comment-link">
                                <div class="box-content-comment">
                                    <i class='bx bxs-bell-ring'></i>
                                    <span class="user-comment"><?=$username?> vừa comment</span>
                                </div>
                                <span class="time-comment">Comment lúc <?=$time?></span>
                            </a>
                        </li>
                <?php
                    }
                } else {
                ?>
                    <li class="item_dash-comment">Chưa có comment mới nào</li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>