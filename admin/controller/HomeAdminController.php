<?php
require_once PATH_ROOT_ADMIN."/DAO/PostDao.php";
require_once PATH_ROOT_ADMIN."/DAO/BannerDao.php";
require_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
require_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
require_once PATH_ROOT_ADMIN."/DAO/CommentDao.php";
class HomeAdminController {
    public function home() {
        $bannerDao = new BannerDao();
        $postDao = new PostDao();
        $navigationDao = new NavigationDao();
        $userDao = new UserDao();
        $commentDao = new CommentDao();
        $allPost = $postDao->getAllPost();
        $allUser = $userDao->getAllUsers();
        $allNav = $navigationDao->getAllNav();
        $allBanner = $bannerDao->getAllBanner();
        $allNewComment = $commentDao->getAllCommentByStatus(0);
        include_once PATH_ROOT_ADMIN."/view/mainView.php";
    }
}
?>