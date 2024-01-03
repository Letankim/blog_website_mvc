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

    public function filterByAuthor() {
        require_once APP_ROOT."/DAO/UserDao.php";
        $postDao = new PostDao();
        $userDao = new UserDao();
        if(isset($_GET['idAuthor'])) {
            $idAuthor = $_GET['idAuthor'];
            $resultSearch = $postDao->getPostByAuthor($idAuthor);
            $author = $userDao->getOneUser($idAuthor);
            $nameAuthor = $author != null ? $author->getName() : "Unknown";
            $titleHead = "Tác giả ".$nameAuthor;
            $messageTitle = "Tất cả ".count($resultSearch)." bài viết của ".$nameAuthor;
            include_once APP_ROOT."/view/SearchView.php";
        } else {
            header("Location: ./notFound.html");
        }
    }
}
?>