<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Introduction.php";
class AboutDao {
    private static $db;
    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new ConnectionAdmin();
    }

    function getALlIntro() {
        $sql = "SELECT * FROM tbl_introduction ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $introductions = array();
        foreach ($resultSQL as $row) {
            $id = $row['id'];
            $img = $row['img'];
            $content = $row['content'];;
            $status = $row['status'];
            $date = $row['date'];
            $introduction = new Introduction($id, $img, $content, $status, $date);
            $introductions[] = $introduction;
        }
        return $introductions;
    }
    function getFilterIntro($status) {
        $params = array(":status"=>$status);
        $sql = "SELECT * FROM tbl_introduction WHERE status=:status ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql, $params);
        $introductions = array();
        foreach ($resultSQL as $row) {
            $id = $row['id'];
            $img = $row['img'];
            $content = $row['content'];;
            $status = $row['status'];
            $date = $row['date'];
            $introduction = new Introduction($id, $img, $content, $status, $date);
            $introductions[] = $introduction;
        }
        return $introductions;
    }
    function getOneIntro($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_introduction WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            $id = $row['id'];
            $img = $row['img'];
            $content = $row['content'];;
            $status = $row['status'];
            $date = $row['date'];
            $introduction = new Introduction($id, $img, $content, $status, $date);
            return $introduction;
        }
        return null;
    }
    function addIntro($about) {
        $params = array(
            ":status"=>$about->getStatus(), 
            ":content"=>$about->getContent(),
            ":img"=>$about->getImg(),
            ":date"=>$about->getDate()
        );
        $sql = "INSERT INTO tbl_introduction (content, status, img, date) VALUES (:content, :status, :img, :date)";
        return self::$db->insert($sql, $params);
    }
    function updateIntro($about) {
        $params = array(
            ":status"=>$about->getStatus(), 
            ":content"=>$about->getContent(),
            ":img"=>$about->getImg(),
            ":id"=>$about->getId()
        );
        $sql = "UPDATE tbl_introduction SET status=:status, img = :img, content = :content WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function updateStatusIntro($id, $status) {
        $params = array(
            ":id" => $id,
            ":status" => $status
        );
        $sql = "UPDATE tbl_introduction SET status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function deleteIntro($id) {
        $params = array(":id" => $id);
        $sql = "DELETE FROM tbl_introduction WHERE id=:id";
        return self::$db->delete($sql, $params);
    }

    function deleteAllIntro() {
        $sql = "DELETE FROM tbl_introduction";
        delete($sql);
    }
}
?>