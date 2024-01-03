<?php
require_once APP_ROOT."/DAO/PostDao.php";
class SearchController {
    public function search() {
        $postDao = new PostDao();
        if(isset($_POST['search'])) {
            $titleHead = "Tìm kiếm";
            $keyWord = $_POST['keyword'];
            $resultSearch = $postDao->getSearch($keyWord);
            $messageTitle = "Kết quả tìm kiếm cho ".$keyWord." có ".count($resultSearch)."kết quả phù hợp";
            include_once APP_ROOT."/view/SearchView.php";
        } else {
            header("Location: ./notFound.html");
        }
    }
}
?>