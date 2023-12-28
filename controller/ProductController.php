<?php
require_once APP_ROOT."/DAO/ProductDao.php";
class ProductController {
    public function product() {
        $productDao = new ProductDao();
        $allProduct = $productDao->getAllProduct();
        $pages = ceil(count($allProduct) / 12);
        $pageNumber = 1;
        if(isset($_GET['page']) && $_GET['page']) {
            $pageNumber = $_GET['page'];
            $page = ($pageNumber - 1) * 12;
        } else {
            $page = 0;
        }
        $allProduct = $productDao->pageProduct($page, 12);
        include_once APP_ROOT."/view/ProductView.php";
    }
}
?>