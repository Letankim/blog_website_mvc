<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Navigation.php";
class NavigationDao {
    private static $db;
    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new ConnectionAdmin();
    }

    function getAllNav() {
        $sql = "SELECT * FROM tbl_navigation ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $navigation = array();
        foreach ($resultSQL as $row) {
            $id = $row['id'];
            $name = $row['name'];
            $status = $row['status'];
            $date = $row['date'];
            $nav = new Navigation($id, $name, $status, $date);
            $navigation[] = $nav;
        }
        return $navigation;
    }

    function getOneNav($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_navigation WHERE id=:id";
        $navigation = self::$db->get_one($sql, $params);
        if($navigation) {
            $id = $navigation['id'];
            $name = $navigation['name'];
            $status = $navigation['status'];
            $date = $navigation['date'];
            $nav = new Navigation($id, $name, $status, $date);
            return $nav;
        }
        return null;
    }

    function getFilterNav($status) {
        $params = array(
            ":status"=>$status
        );
        $sql = "SELECT * FROM tbl_navigation WHERE status=:status";
        $resultSQL = self::$db->getAll($sql, $params);
        $navigation = array();
        foreach ($resultSQL as $row) {
            $id = $row['id'];
            $name = $row['name'];
            $status = $row['status'];
            $date = $row['date'];
            $nav = new Navigation($id, $name, $status, $date);
            $navigation[] = $nav;
        }
        return $navigation;
    }

    function addNavigation($navigation) {
        $params = array(
            ":navigation"=>$navigation->getName(),
            ":status"=>$navigation->getStatus(),
            ":date"=>$navigation->getDate(),
        );
        $sql = "INSERT INTO tbl_navigation (name, status, date) VALUES (:navigation, :status, :date)";
        return self::$db->insert($sql, $params);
    }

    function updateNavigation($navigation) {
        $params = array(
            ":navigation"=>$navigation->getName(),
            ":id"=>$navigation->getId(),
            ":status"=>$navigation->getStatus()
        );
        $sql = "UPDATE tbl_navigation SET name=:navigation, status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function updateStatusNav($id, $status) {
        $params = array(
            ":id"=>$id,
            ":status"=>$status
        );
        $sql = "UPDATE tbl_navigation SET status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function deleteNav($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_navigation WHERE id=:id";
        return self::$db->delete($sql, $params);
    }
    function deleteAllNav() {
        $sql = "DELETE FROM tbl_navigation";
        return self::$db->delete($sql);
    }
}
?>