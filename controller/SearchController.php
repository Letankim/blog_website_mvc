<?php
require_once APP_ROOT."/DAO/PostDao.php";
class SearchController {
    public function search() {
        $postDao = new PostDao();
        if(isset($_POST['search'])) {
            $keyWord = $_POST['keyword'];
            $resultSearch = $postDao->getSearch($keyWord);
        }
        include_once APP_ROOT."/view/SearchView.php";
    }
}
?>