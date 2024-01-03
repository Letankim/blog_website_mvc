<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/Navigation.php";
class NavigationDao {
    private static $db;

    public function __construct() {
        $this->initializeConnection();
    }

    private function initializeConnection() {
        self::$db = new Connection();
    }

    private function navigation($row) {
        $id = $row['id'];
        $name = $row['name'];
        $status = $row['status'];
        $date = $row['date'];
        $navigation = new Navigation($id, $name, $status, $date);
        return $navigation;
    }

    function getAllNav() {
        $sql = "SELECT * FROM tbl_navigation WHERE status = 1 ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $listNav = array();
        foreach ($resultSQL as $row) {
            $listNav[] = $this->navigation($row);
        }
        return $listNav;
    }
    
    function getOneNav($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_navigation WHERE id=:id";
        $resultSQL = self::$db->get_one($sql, $params);
        if($resultSQL) {
            return $this->navigation($resultSQL);
        }
        return null;
    }
}
?>