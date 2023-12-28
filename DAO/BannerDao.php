<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/Banner.php";
class BannerDao {
    private static $db;

    public function __construct() {
        $this->initializeConnection();
    }

    private function initializeConnection() {
        self::$db = new Connection();
    }

    public function showBannerSlide() {
        $sql = "SELECT * FROM tbl_banner WHERE status=1 ORDER BY id DESC LIMIT 5";
        $banners = array();
        $resultSQL = self::$db->getAll($sql);
        foreach($resultSQL as $row) {
            $id = $row['id'];
            $img = $row['img'];
            $status = $row['status'];
            $date = $row['date'];
            $banner = new Banner($id, $img, $status, $date);
            $banners[] = $banner;
        }
        return $banners;
    }
}

?>