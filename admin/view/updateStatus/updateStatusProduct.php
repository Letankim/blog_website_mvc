<?php
    require_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/ProductDao.php";
    include_once PATH_ROOT_ADMIN."/view/handleShow/showProduct.php";
    $productDao = new ProductDao();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    $productDao->updateStatusProduct($id, $status);
    $allProduct= $productDao->getAllProduct();
    showProduct($allProduct);
?>