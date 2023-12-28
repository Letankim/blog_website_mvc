<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Product.php";
class ProductDao {
    private static $db;
    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new ConnectionAdmin();
    }

    function getAllProduct() {
        $sql = "SELECT * FROM tbl_product ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $products = array();
        foreach ($resultSQL as $row) {
            $id = $row['id'];
            $img = $row['img'];
            $link_demo = $row['link_demo'];
            $link_code = $row['link_code'];
            $status = $row['status'];
            $date = $row['date'];
            $product = new Product($id, $img, $link_demo, $link_code, $status, $date);
            $products[] = $product;
        }
        return $products;
    }
    function getFilterProduct($status) {
        $sql = "SELECT * FROM tbl_product WHERE status=$status ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $products = array();
        foreach ($resultSQL as $row) {
            $id = $row['id'];
            $img = $row['img'];
            $link_demo = $row['link_demo'];
            $link_code = $row['link_code'];
            $status = $row['status'];
            $date = $row['date'];
            $product = new Product($id, $img, $link_demo, $link_code, $status, $date);
            $products[] = $product;
        }
        return $products;
    }
    function getProductShow() {
        $sql = "SELECT * FROM tbl_product WHERE status=1 ORDER BY id DESC LIMIT 1";
        return get_one($sql);
    }
    function getOneProduct($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_product WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            $id = $row['id'];
            $img = $row['img'];
            $link_demo = $row['link_demo'];
            $link_code = $row['link_code'];
            $status = $row['status'];
            $date = $row['date'];
            $product = new Product($id, $img, $link_demo, $link_code, $status, $date);
            return $product;
        }
        return null;
    }
    function addProduct($product) {
        $params = array(
            ":linkDemo"=>$product->getLink_demo(),
            ":linkCode"=>$product->getLink_code(),
            ":img"=>$product->getImg(),
            ":status"=>$product->getStatus(),
            ":date"=>$product->getDate()
        );
        $sql = "INSERT INTO tbl_product (link_demo, link_code, img, date, status) 
        VALUES (:linkDemo, :linkCode, :img, :date,:status)";
        return self::$db->insert($sql, $params);
    }
    function updateProduct($product) {
        $params = array(
            ":linkDemo"=>$product->getLink_demo(),
            ":linkCode"=>$product->getLink_code(),
            ":img"=>$product->getImg(),
            ":status"=>$product->getStatus(),
            ":id"=>$product->getId()
        );
        $sql = "UPDATE tbl_product SET status=:status, img = :img, 
        link_code = :linkCode, link_demo=:linkDemo WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function updateStatusProduct($id, $status) {
        $params = array(':status' => $status,":id"=>$id);
        $sql = "UPDATE tbl_product SET status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    
    function deleteProduct($id) {
        $params = array(':id' => $id);
        $sql = "DELETE FROM tbl_product WHERE id=:id";
        return self::$db->delete($sql, $params);
    }

    function deleteAllProduct() {
        $sql = "DELETE FROM tbl_product";
        return self::$db->delete($sql);
    }
}
?>