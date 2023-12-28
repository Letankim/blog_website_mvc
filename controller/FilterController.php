<?php
require_once APP_ROOT."/DAO/PostDao.php";
require_once APP_ROOT."/DAO/NavigationDao.php";
class FilterController {
    public function filter() {
        $postDao = new PostDao();
        $navigationDao = new NavigationDao();
        if(isset($_POST['filter']) || isset($_GET['page'])) {
            if(isset($_POST['filterValue'])) {
                $filterIdCategories = $_POST['filterValue'];
            } else {
                $filterIdCategories = $_GET['catalog'];
            }
            $allPost = $postDao->getFilterPost($filterIdCategories);
            $pages = ceil(count($allPost) / 5);
            $pageNumber = 1;
            if(isset($_GET['page']) && $_GET['page']) {
                $pageNumber = $_GET['page'];
                $page = ($pageNumber - 1) * 5;
                if($pageNumber > $pages || $pageNumber <= 0) {
                    header("Location: ../../404.html");
                }
            } else {
                $page = 0;
            }
            $pagePost = $postDao->pagePostsFilter($page, 5, $filterIdCategories);
            $allNav = $navigationDao->getAllNav();
            include_once APP_ROOT."/view/FilterPostView.php";
        }
    }
}
?>