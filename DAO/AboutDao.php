<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/Introduction.php";
class AboutDao
{
    private static $db;

    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new Connection();
    }
    function getIntroShow()
    {
        $sql = "SELECT * FROM tbl_introduction WHERE status=1 ORDER BY id DESC LIMIT 1";
        $resultSQL = self::$db->get_one($sql);
        if($resultSQL) {
            $id = $resultSQL['id'];
            $img = $resultSQL['img'];
            $content = $resultSQL['content'];;
            $status = $resultSQL['status'];
            $date = $resultSQL['date'];
            $introduction = new Introduction($id, $img, $content, $status, $date);
            return $introduction;
        }
        return null;
    }
}
