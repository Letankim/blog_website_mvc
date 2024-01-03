<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Slogan.php";
class SloganDao {
    private static $db;
    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new ConnectionAdmin();
    }

    private function slogan($row) {
        $id = $row['id'];
        $topSlogan = $row['topslogan'];
        $bottomSlogan = $row['bottomslogan'];
        $status = $row['status'];
        $date = $row['date'];
        $slogan = new Slogan($id, $topSlogan, $bottomSlogan, $status, $date);
        return $slogan;
    }

    function getAllSlogan() {
        $sql = "SELECT * FROM tbl_slogan ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $slogans = array();
        foreach ($resultSQL as $row) {
            $slogans[] = $this->slogan($row);
        }
        return $slogans;
    }

    function getFilterSlogan($status) {
        $params = array(":status"=>$status);
        $sql = "SELECT * FROM tbl_slogan WHERE status=:status ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql, $params);
        $slogans = array();
        foreach ($resultSQL as $row) {
            $slogans[] = $this->slogan($row);
        }
        return $slogans;
    }
    function getOneSlogan($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_slogan WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->slogan($row);;
        }
        return null;
    }
    
    function addSlogan($slogan) {
        $params = array(
            ":status"=>$slogan->getStatus(),
            ":topSlogan"=>$slogan->getTopslogan(),
            ":bottomSlogan"=>$slogan->getBottomslogan(),
            ":date"=>$slogan->getDate(),
        );
        $sql = "INSERT INTO tbl_slogan (topslogan, bottomslogan,status, date) 
        VALUES (:topSlogan,:bottomSlogan,:status, :date)";
        return self::$db->insert($sql, $params);
    }
    function updateSlogan($slogan) {
        $params = array(
            ":status"=>$slogan->getStatus(),
            ":topSlogan"=>$slogan->getTopslogan(),
            ":bottomSlogan"=>$slogan->getBottomslogan(),
            ":id"=>$slogan->getId(),
        );
        $sql = "UPDATE tbl_slogan SET topslogan=:topSlogan, bottomslogan=:bottomSlogan,
         status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function updateStatusSlogan($id, $status) {
        $params = array(
            ":status"=>$status,
            ":id"=>$id
        );
        $sql = "UPDATE tbl_slogan SET status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function deleteSlogan($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_slogan WHERE id=:id"; 
        return self::$db->delete($sql, $params);
    }

    function deleteAllSlogan() {
        $sql = "DELETE FROM tbl_slogan";
        return self::$db->delete($sql);
    }
}
?>