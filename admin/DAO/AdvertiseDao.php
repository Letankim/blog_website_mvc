<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Advertise.php";
class AdvertiseDao {
    private static $db;

    public function __construct() {
        $this->initializeConnection();
    }

    private function initializeConnection() {
        self::$db = new ConnectionAdmin();
    }

    private function advertise($row) {
        $id = $row['id'];
        $name_program = $row['name_program'];
        $link = $row['link_adver'];
        $img = $row['img_adver'];
        $status = $row['status'];
        $date = $row['date'];
        $a = new Advertise($id, $name_program, $link, $img, $status, $date);
        return $a;
    }

    function getAllAdvertise() {
        $sql = "SELECT * FROM tbl_advertiser ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $advertise = array();
        foreach ($resultSQL as $row) {
            $advertise[] = $this->advertise($row);
        }
        return $advertise;
    }
    function getFilterAdvertise($status) {
        $params = array(":status"=>$status);
        $sql = "SELECT * FROM tbl_advertiser WHERE status=:status ORDER BY id DESC";
        $resultSQL = self::$db-> getAll($sql, $params);
        $advertise = array();
        foreach ($resultSQL as $row) {
            $advertise[] = $this->advertise($row);
        }
        return $advertise;
    }
    function getOneAdvertise($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_advertiser WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->advertise($row);;
        }
        return null;
    }
    function addAdvertise($advertise) {
        $params = array(
            ":name"=>$advertise->getName_program(),
            ":link"=>$advertise->getLink(),
            ":status"=>$advertise->getStatus(),
            ":date"=>$advertise->getDate(),
            ":img"=>$advertise->getImg(),
        );
        $sql = "INSERT INTO tbl_advertiser (name_program, link_adver, img_adver,status, date) 
        VALUES (:name, :link, :img, :status, :date)";
        return self::$db->insert($sql, $params);
    }
    function updateAdvertise($advertise) {
        $params = array(
            ":name"=>$advertise->getName_program(),
            ":link"=>$advertise->getLink(),
            ":status"=>$advertise->getStatus(),
            ":id"=>$advertise->getId(),
            ":img"=>$advertise->getImg(),
        );
        $sql = "UPDATE tbl_advertiser SET name_program=:name, link_adver=:link, img_adver = :img, status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function updateStatusAdvertise($id, $status) {
        $params = array(
            ":id" => $id,
            ":status" => $status
        );
        $sql = "UPDATE tbl_advertiser SET status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function deleteAdvertise($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_advertiser WHERE id=:id";
        return self::$db->delete($sql, $params);
    }
}
?>