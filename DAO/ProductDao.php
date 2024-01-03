<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/Product.php";
class ProductDao {
    private static $db;

    public function __construct() {
        $this->initializeConnection();
    }

    private function initializeConnection() {
        self::$db = new Connection();
    }

    private function product($row) {
        $id = $row['id'];
        $img = $row['img'];
        $link_demo = $row['link_demo'];
        $link_code = $row['link_code'];
        $status = $row['status'];
        $date = $row['date'];
        $product = new Product($id, $img, $link_demo, $link_code, $status, $date);
        return $product;
    }

    function getAllProduct() {
        $sql = "SELECT * FROM tbl_product WHERE status = 1 ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $products = array();
        foreach ($resultSQL as $row) {
            $products[] = $this->product($row);
        }
        return $products;
    }

    function pageProduct($page, $countPage) {
        $sql = "SELECT * FROM tbl_product WHERE status = 1 ORDER BY id DESC LIMIT $page, $countPage";
        $resultSQL = self::$db->getAll($sql);
        $products = array();
        foreach ($resultSQL as $row) {
            $products[] = $this->product($row);
        }
        return  $products;
    }
}
?>