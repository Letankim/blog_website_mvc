<?php
require_once "./config/config.php";
require_once "./DAO/UserDao.php";
require_once "./DAO/CommentDao.php";
require_once "./Lib/CreateLink.php";
    function showAllPost($allPostInPage) {
        $userDao = new UserDao();
        $commentDao = new CommentDao();
        $createLink = new CreateLink();
        if(count($allPostInPage) > 0) {
            foreach($allPostInPage as $itemPost) {
                $updateTime = $itemPost->getTime_post();
                if($itemPost->getTime_last_update() != NULL) {
                    $updateTime = $itemPost->getTime_last_update();
                }
                $adminPost = $userDao->getOneUser($itemPost->getId_user());
                $nameAdmin = $adminPost->getName() == null ? $adminPost->getUsername() : $adminPost->getName();
                $avatar = $adminPost->getAvatar() == null ? "http://letankim.id.vn/uploads/default_avatar.jpg" : "./uploads/".$adminPost->getAvatar();
                    echo '<div onclick="goToPost(this)" class="card mb-3">
                    <img src="./uploads/'.$itemPost->getImg().'" class="card-img-top img-post" alt="'.$itemPost->getTitle().'">
                    <a href="./post-'.$itemPost->getId().'/'.$createLink->vn_to_str($itemPost->getTitle()).'.html" class="link-hidden"></a>
                    <div class="author">
                        <div class="avatar">
                            <img src="'.$avatar.'" alt="Avatar default">
                        </div>
                        <div class="author-information">
                            <span class="name">'.$nameAdmin.'</span>
                            <span class="time-post">'.$itemPost->getTime_post().'</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'.$itemPost->getTitle().'</h5>
                        <p class="card-text">'.$itemPost->getShortDesc().'</p>
                        <p class="card-text"><small class="text-muted">Lần cuối cùng cập nhật lúc '.$updateTime.'</small></p>
                    </div>
                    <div class="box-action">
                        <div class="group-action">
                            <span>'.$itemPost->getView().'</span>
                            <i class="bx bx-show-alt"></i>
                        </div>
                        <div class="group-action">
                            <span>'.count($commentDao->getNumberCommentByIdPost($itemPost->getId())).'</span>
                            <i class="bx bx-message"></i>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "<img style='width: 100%;' src='./uploads/no-post.png'/>";
        }
    }
    function showPostFeatured($postFeature) {
        $createLink = new CreateLink();
        $result = "";
        if(count($postFeature) > 0) {
            foreach($postFeature as $item) {
                $result.= '<div onclick="goToPost(this)" class="card col-6 col-lg-12 mb-3">
                <a href="./post-'.$item->getId().'/'.$createLink->vn_to_str($item->getTitle()).'.html" class="link-hidden"></a>
                <div class="row g-0">
                    <div class="col-md-4 col-lg-4">
                        <img src="./uploads/'.$item->getImg().'" class="img-fluid rounded-start img-post-featured" alt="'.$item->getTitle().'">
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <div class="card-body">
                            <h5 class="card-title">'.$item->getTitle().'</h5>
                            <p class="card-text">'.$item->getShortDesc().'</p>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }
        return $result;
    }

    function showPostInPage($postInPage) {
        $createLink = new CreateLink();
        $userDao = new UserDao();
        $commentDao = new CommentDao();
        if(count($postInPage) > 0) {
            foreach($postInPage as $item) {
                $updateTime = $item->getTime_post();
                if($item->getTime_last_update() != NULL) {
                    $updateTime = $item->getTime_last_update();
                }
                $adminPost = $userDao->getOneUser($item->getId_user());
                $nameAdmin = $adminPost->getName() == null ? $adminPost->getUsername() : $adminPost->getName();
                $avatar = $adminPost->getAvatar() == null ? "http://letankim.id.vn/uploads/default_avatar.jpg" : "./uploads/".$adminPost->getAvatar();
                echo '
                <div onclick="goToPost(this)" class="card mb-3">
                    <a href="./post-'.$item->getId().'/'.$createLink->vn_to_str($item->getTitle()).'.html" class="link-hidden"></a>
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="./uploads/'.$item->getImg().'" class="img-fluid rounded-start" alt="'.$item->getTitle().'">
                        </div>
                        <div class="col-md-7 card-in-post">
                            <div class="author">
                                <div class="avatar">
                                    <img src="'.$avatar.'" alt="Avatar  default">
                                </div>
                                <div class="author-information">
                                    <span class="name">'.$nameAdmin.'</span>
                                    <span class="time-post">'.$item->getTime_post().'</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">'.$item->getTitle().'</h5>
                                <p class="card-text">'.$item->getShortDesc().'</p>
                                <p class="card-text"><small class="text-muted">Lần cuối cùng cập nhật lúc '.$updateTime.'</small></p>
                            </div>
                            <div class="box-action">
                                <div class="group-action">
                                    <span>'.$item->getView().'</span>
                                    <i class="bx bx-show-alt"></i>
                                </div>
                                <div class="group-action">
                                    <span>'.count($commentDao->getNumberCommentByIdPost($item->getId())).'</span>
                                    <i class="bx bx-message"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "<img style='width: 100%;' src='./uploads/no-post.png'/>";
        }
    }
?>