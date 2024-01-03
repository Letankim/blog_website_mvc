<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Banner.php";
class BannerDao {
    private static $db;
    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new ConnectionAdmin();
    }

    private function banner($row) {
        $id = $row['id'];
        $img = $row['img'];
        $status = $row['status'];
        $date = $row['date'];
        $banner = new Banner($id, $img, $status, $date);
        return $banner;
    }

    function getAllBanner() {
        $sql = "SELECT * FROM tbl_banner ORDER BY id DESC";
        $banners = array();
        $resultSQL = self::$db->getAll($sql);
        foreach($resultSQL as $row) {
            $banners[] = $this->banner($row);
        }
        return $banners;
    }

    function getFilterBanner($status) {
        $params = array(":status"=>$status);
        $sql = "SELECT * FROM tbl_banner WHERE status=:status ORDER BY id DESC";
        $banners = array();
        $resultSQL = self::$db->getAll($sql,$params);
        foreach($resultSQL as $row) {
            $banners[] = $this->banner($row);
        }
        return $banners;
    }
    function getOneBanner($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_banner WHERE id=:id";
        $banner = self::$db->get_one($sql, $params);
        if($banner) {
            return $this->banner($banner);
        }
        return null;
    }
    function addBanner($banner) {
        $params = array(
            ":status"=>$banner->getStatus(),
            ":img"=>$banner->getImg(),
            ":date"=>$banner->getDate()
        );
        $sql = "INSERT INTO tbl_banner (img, status, date) VALUES (:img, :status, :date)";
        return self::$db->insert($sql, $params);
    }
    function updateBanner($banner) {
        $params = array(
            ":id"=>$banner->getId(),
            ":img"=>$banner->getImg(),
            ":status"=>$banner->getStatus(),
        );
        $sql = "UPDATE tbl_banner SET status=:status, img = :img WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    
    function updateStatusBanner($id,$status) {
        $params = array(
            ":id"=>$id,
            ":status"=>$status
        );
        $sql = "UPDATE tbl_banner SET status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function deleteBanner($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_banner WHERE id=:id";
        return self::$db->delete($sql, $params);
    }
}
?>