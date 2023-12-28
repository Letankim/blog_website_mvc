<?php
require_once PATH_ROOT_ADMIN."/DAO/ProductDao.php";
require_once PATH_ROOT."/model/Product.php";
class ProductAdminController {
    public function adminProduct() {
        $productDao = new ProductDao();
        $allProduct = $productDao->getAllProduct();
        include_once PATH_ROOT_ADMIN."/view/productView.php";
    }

    public function adminAddProduct() {
        $productDao = new ProductDao();
        $linkDemo = $_POST['link-demo'];
        $linkCode = $_POST['link-code'];
        $status = $_POST['status'];
        $img = "no";
        $date= date('Y/m/d H:i:s');
        $product = new Product(null, $img, $linkDemo, $linkCode, $status, $date);
        $isDone = $productDao->addProduct($product);
        $type = "fail";
        if ($isDone >= 1) {
            $type = "success";
        }
        header("location: ?act=product&status=".$type);
    }

    public function adminEditFormProduct() {
        if(isset($_GET['id']) && $_GET['id']) {
            $productDao = new ProductDao();
            $id = $_GET['id'];
            $currentProduct = $productDao->getOneProduct($id);
            $allProduct = $productDao->getAllProduct();
            include_once PATH_ROOT_ADMIN."/view/editForm/editProductForm.php";
        } else {
            header("location: ?act=404");
        }
    }

    public function adminUpdateProduct() {
        if(isset($_POST['update-product']) && $_POST['update-product']) {
            $productDao = new ProductDao();
            $linkDemo = $_POST['link-demo'];
            $linkCode = $_POST['link-code'];
            $status = $_POST['status'];
            $id = $_POST['id'];
            $img = "no";
            $product = new Product($id, $img, $linkDemo, $linkCode, $status, null);
            $isDone = $productDao->updateProduct($product);
            $type = "fail";
            if ($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=product&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminDeleteProduct() {
        if(isset($_GET['id']) && $_GET['id']) {
            $productDao = new ProductDao();
            $id = $_GET['id'];
            $isDone = $productDao->deleteProduct($id);
            $type = "fail";
            if ($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=product&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }
}
?>