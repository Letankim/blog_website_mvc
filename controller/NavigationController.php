<?php
require_once APP_ROOT."/DAO/NavigationDao.php";
require_once APP_ROOT."/DAO/PostDao.php";
require_once APP_ROOT."/Lib/CreateLink.php";
class NavigationController {
    public function showPostNavigation() {
        if(isset($_GET['id']) && $_GET['id'] && isset($_GET['title']) && $_GET['title']) {
            $idNav = $_GET['id'];
            $postDao = new PostDao();
            $navigationDao = new NavigationDao();
            $currentNavigation = $navigationDao->getOneNav($idNav);
            $allPost = $postDao->getFilterPost($idNav);
            $pages = ceil(count($allPost) / 5);
            $pageNumber = 1;
            if(isset($_GET['page']) && $_GET['page']) {
                $pageNumber = $_GET['page'];
                $page = ($pageNumber - 1) * 5;
                if($pageNumber > $pages || $pageNumber <= 0) {
                    header("Location: ../../../404.html");
                }
            } else {
                $page = 0;
            }
            $pagePost = $postDao->pagePostsFilter($page, 5, $idNav);
            include_once APP_ROOT."/view/NavigationPostView.php";
        } else {
            header("Location: ./404.html");
        }
    }
}
?>