<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/Post.php";
require_once APP_ROOT."/Lib/Time.php";
class PostDao {
    private static $db;
    private static $date;

    public function __construct() {
        $this->initializeConnection();
    }

    private function initializeConnection() {
        self::$db = new Connection();
        self::$date = getCurrentTime();
    }

    private function post($row) {
        $id = $row['id'];
        $title = $row['title'];
        $shortDesc = $row['shortDesc'];
        $img = $row['img'];
        $content = $row['content'];
        $status = $row['status'];
        $priority = $row['priority'];
        $id_nav = $row['id_nav'];
        $id_user = $row['id_user'];
        $time_post = $row['time_post'];
        $time_last_update = $row['time_last_update'];
        $updateBy = $row['update_by'];
        $view = $row['view'];
        $schedule = $row['schedule'];
        $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $updateBy,$view, $schedule);
        return $post;
    }

    function getAllPostActive() {
        $params = array(":date"=>self::$date);
        $sql = "SELECT N.id as nav_id, P.* FROM tbl_post as P 
        JOIN tbl_navigation as N ON P.id_nav = N.id
        WHERE P.status=1 AND N.status=1 AND DATE(P.schedule) <= DATE(:date) ORDER BY P.priority DESC, P.id DESC";
        $posts = array();
        $resultSQL = self::$db->getAll($sql, $params);
        foreach ($resultSQL as $row) {
            $posts[] = $this->post($row);
        }
        return $posts;
    }

    function pagePosts($page, $countPage) {
        $params = array(":date"=>self::$date);
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P
        JOIN tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.status=1 AND N.status=1 AND DATE(P.schedule) <= DATE(:date) ORDER BY P.id DESC LIMIT $page, $countPage";
        $posts = array();
        $resultSQL = self::$db->getAll($sql, $params);
        foreach ($resultSQL as $row) {
            $posts[] = $this->post($row);
        }
        return $posts;
    }

    function pagePostsFilter($page, $countPage, $idCategory) {
        $paramsDate = array(":date"=>self::$date);
        $params = array(
            ":idCategory"=>$idCategory,
            ":date"=>self::$date);
        $resultSQL = array();
        if($idCategory != -1) {
            $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P
            JOIN tbl_navigation as N ON P.id_nav = N.id 
            WHERE P.id_nav = :idCategory AND P.status=1 AND N.status=1 
            AND DATE(P.schedule) <= DATE(:date)
            ORDER BY P.id DESC LIMIT $page, $countPage";
            $resultSQL = self::$db->getAll($sql, $params);
        } else {
            $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P
            JOIN tbl_navigation as N ON P.id_nav = N.id 
            WHERE P.status=1 AND N.status=1 AND DATE(P.schedule) <= DATE(:date) 
            ORDER BY P.id DESC LIMIT $page, $countPage";
            $resultSQL = self::$db->getAll($sql, $paramsDate);
        }
        $posts = array();
        foreach ($resultSQL as $row) {
            $posts[] = $this->post($row);
        }
        return $posts;
    }
    
    function allPostActiveMain() {
        $params = array(":date"=>self::$date);
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P 
        JOIN tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.status=1 AND N.status=1 AND DATE(P.schedule) <= DATE(:date) ORDER BY P.priority 
        DESC , P.id DESC, P.view DESC";
        $posts = array();
        $resultSQL = self::$db->getAll($sql, $params);
        foreach($resultSQL as $row) {
            $posts[] = $this->post($row);
        }
        return $posts;
    }

    function getOnePost($id) {
        $params = array(
            ":id"=>$id,
            ":date"=>self::$date
        );
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P JOIN 
        tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.id = :id AND P.status=1 AND N.status=1 AND DATE(P.schedule) <= DATE(:date) 
        ORDER BY P.priority desc ,P.id DESC LIMIT 5";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->post($row);;
        }
        return null;
    }

    function getFilterPost($idNav) {
        $paramsDate = array(":date"=>self::$date);
        $params = array(
            ":idNav"=>$idNav,
            ":date"=>self::$date);
        $resultSQL = array();
        if($idNav == -1) {
            $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P 
            JOIN tbl_navigation as N ON P.id_nav = N.id 
            WHERE P.status=1 AND N.status=1 AND DATE(P.schedule) <= DATE(:date)
            ORDER BY P.priority desc ,P.id DESC";
            $resultSQL = self::$db->getAll($sql, $paramsDate);
        } else {
            $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P 
            JOIN tbl_navigation as N ON P.id_nav = N.id 
            WHERE P.id_nav = :idNav AND P.status=1 AND DATE(P.schedule) <= DATE(:date)
            AND N.status=1 ORDER BY P.priority desc ,P.id DESC";
            $resultSQL = self::$db->getAll($sql, $params);
        }
        $posts = array();
        foreach ($resultSQL as $row) {
            $posts[] = $this->post($row);
        }
        return $posts;
    }

    function getRelatedPost($idNav, $id) {
        $params = array(
            ":idNav"=>$idNav, 
            ":id"=>$id,
            ":date"=>self::$date
        );
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P 
        JOIN tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.id_nav = :idNav AND P.id <> :id AND 
        P.status=1 AND N.status=1 AND DATE(P.schedule) <= DATE(:date)
        ORDER BY P.priority desc ,P.id DESC LIMIT 4";
        $posts = array();
        $resultSQL = self::$db->getAll($sql, $params);
        foreach ($resultSQL as $row) {
            $posts[] = $this->post($row);
        }
        return $posts;
    }

    function getSearch($keyWord) {
        $params= array(":date"=>self::$date);
        $sql = "SELECT N.id as nav_id, P.* FROM tbl_post as P join tbl_navigation as N
        on P.id_nav = N.id
        WHERE P.status = 1 and N.status = 1 AND DATE(P.schedule) <= DATE(:date)
        AND (`title` LIKE '%".$keyWord."%') ORDER BY P.priority DESC, P.id DESC";
        $posts = array();
        $resultSQL = self::$db->getAll($sql, $params);
        foreach ($resultSQL as $row) {
            $posts[] = $this->post($row);
        }
        return $posts;
    }

    function getPostByAuthor($author) {
        $params= array(
            ":date"=>self::$date,
            ":author"=>$author
        );
        $sql = "SELECT N.id as nav_id, P.* FROM tbl_post as P join tbl_navigation as N
        on P.id_nav = N.id
        WHERE P.status = 1 and N.status = 1 AND DATE(P.schedule) <= DATE(:date)
        AND id_user=:author ORDER BY P.priority DESC, P.id DESC";
        $posts = array();
        $resultSQL = self::$db->getAll($sql, $params);
        foreach ($resultSQL as $row) {
            $posts[] = $this->post($row);
        }
        return $posts;
    }

    function updateView($id, $view) {
        $params = array(
            ":view" => $view,
            ":id" => $id
        );
        $sql = "UPDATE tbl_post SET view=:view WHERE id=:id";
        self::$db->update($sql, $params);
    }
}
?>