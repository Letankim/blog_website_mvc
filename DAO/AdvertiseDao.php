<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/Advertise.php";
class AdvertiseDao {
    private static $db;

    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new Connection();
    }
    public function showAdvertise() {
        $sql = "SELECT * FROM tbl_advertiser WHERE status=1 ORDER BY id DESC LIMIT 1";
        $resultSQL = self::$db->get_one($sql);
        if($resultSQL) {
            $id = $resultSQL['id'];
            $name = $resultSQL['name_program'];
            $link = $resultSQL['link_adver'];
            $img = $resultSQL['img_adver'];
            $date = $resultSQL['date'];
            $status = $resultSQL['status'];
            $advertise = new Advertise($id, $name, $link, $img, $status, $date);
            return $advertise;
        }
        return null;
    }
}
?>