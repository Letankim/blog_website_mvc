<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/Slogan.php";
class SloganDao {
    private static $db;

    public function __construct() {
        $this->initializeConnection();
    }

    private function initializeConnection() {
        self::$db = new Connection();
    }

    function showTopSlogan() {
        $sql = "SELECT * FROM tbl_slogan WHERE status=1 ORDER BY id DESC LIMIT 1";
        $resultSQL = self::$db->get_one($sql);
        if($resultSQL) {
            $id = $resultSQL['id'];
            $topSlogan = $resultSQL['topslogan'];
            $bottomSlogan = $resultSQL['bottomslogan'];
            $status = $resultSQL['status'];
            $date = $resultSQL['date'];
            $slogan = new Slogan($id, $topSlogan, $bottomSlogan, $status, $date);
            return $slogan;
        }
        return null;
    }
}
?>