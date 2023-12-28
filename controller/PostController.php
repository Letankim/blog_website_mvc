<?php
require_once APP_ROOT."/DAO/PostDao.php";
require_once APP_ROOT."/DAO/NavigationDao.php";
class PostController
{
    public function post()
    {
        $postDao = new PostDao();
        $navigationDao = new NavigationDao();
        $allPost = $postDao->getAllPostActive();
        $pages = ceil(count($allPost) / 5);
        $pageNumber = 1;
        if (isset($_GET['page']) && $_GET['page']) {
            $pageNumber = $_GET['page'];
            $page = ($pageNumber - 1) * 5;
            if($pageNumber > $pages || $pageNumber <= 0) {
                header("Location: ../404.html");
            }
        } else {
            $page = 0;
        }
        $pagePost = $postDao->pagePosts($page, 5);
        $allNav = $navigationDao->getAllNav();
        include_once APP_ROOT."/view/PostView.php";
    }
}
