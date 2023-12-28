<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/Post.php";
class PostDao {
    private static $db;

    public function __construct() {
        $this->initializeConnection();
    }

    private function initializeConnection() {
        self::$db = new Connection();
    }

    function getAllPostActive() {
        $sql = "SELECT N.id as nav_id, P.* FROM tbl_post as P 
        JOIN tbl_navigation as N ON P.id_nav = N.id
        WHERE P.status=1 AND N.status=1 ORDER BY P.priority DESC, P.id DESC";
        $posts = array();
        $resultSQL = self::$db->getAll($sql);
        foreach ($resultSQL as $row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            $posts[] = $post;
        }
        return $posts;
    }
    function pagePosts($page, $countPage) {
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P
        JOIN tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.status=1 AND N.status=1 ORDER BY P.id DESC LIMIT $page, $countPage";
        $posts = array();
        $resultSQL = self::$db->getAll($sql);
        foreach ($resultSQL as $row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            $posts[] = $post;
        }
        return $posts;
    }
    function pagePostsFilter($page, $countPage, $idCategory) {
        $params = array(":idCategory"=>$idCategory);
        $resultSQL = array();
        if($idCategory != -1) {
            $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P
            JOIN tbl_navigation as N ON P.id_nav = N.id 
            WHERE P.id_nav = :idCategory AND P.status=1 AND N.status=1 ORDER BY P.id DESC LIMIT $page, $countPage";
            $resultSQL = self::$db->getAll($sql, $params);
        } else {
            $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P
            JOIN tbl_navigation as N ON P.id_nav = N.id 
            WHERE P.status=1 AND N.status=1 ORDER BY P.id DESC LIMIT $page, $countPage";
            $resultSQL = self::$db->getAll($sql);
        }
        $posts = array();
        foreach ($resultSQL as $row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            $posts[] = $post;
        }
        return $posts;
    }
    function allPostActiveMain() {
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P JOIN tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.status=1 AND N.status=1 ORDER BY P.priority desc ,P.id DESC LIMIT 5";
        $posts = array();
        $resultSQL = self::$db->getAll($sql);
        foreach ($resultSQL as $row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            $posts[] = $post;
        }
        return $posts;
    }
    function getOnePost($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P JOIN tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.id = :id AND P.status=1 AND N.status=1 ORDER BY P.priority desc ,P.id DESC LIMIT 5";
        $row = self::$db->get_one($sql, $params);
        if($row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            return $post;
        }
        return null;
    }
    function getFilterPost($idNav) {
        $params = array(":idNav"=>$idNav);
        $resultSQL = array();
        if($idNav == -1) {
            $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P JOIN tbl_navigation as N ON P.id_nav = N.id 
            WHERE P.status=1 AND N.status=1 ORDER BY P.priority desc ,P.id DESC";
            $resultSQL = self::$db->getAll($sql);
        } else {
            $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P JOIN tbl_navigation as N ON P.id_nav = N.id 
            WHERE P.id_nav = :idNav AND P.status=1 AND N.status=1 ORDER BY P.priority desc ,P.id DESC";
            $resultSQL = self::$db->getAll($sql, $params);
        }
        $posts = array();
        foreach ($resultSQL as $row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            $posts[] = $post;
        }
        return $posts;
    }
    function getRelatedPost($idNav, $id) {
        $params = array(":idNav"=>$idNav, ":id"=>$id);
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P JOIN tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.id_nav = :idNav AND P.id <> :id AND P.status=1 AND N.status=1 ORDER BY P.priority desc ,P.id DESC LIMIT 4";
        $posts = array();
        $resultSQL = self::$db->getAll($sql, $params);
        foreach ($resultSQL as $row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            $posts[] = $post;
        }
        return $posts;
    }
    function getPostFeatured() {
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P JOIN tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.priority = 1 AND P.status=1 AND N.status=1 ORDER BY P.priority desc ,P.id DESC LIMIT 5";
        $posts = array();
        $resultSQL = self::$db->getAll($sql);
        foreach ($resultSQL as $row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            $posts[] = $post;
        }
        return $posts;
    }
    function getPostByView() {
        $sql = "SELECT P.id, N.id AS nav_id, P.* FROM tbl_post as P JOIN tbl_navigation as N ON P.id_nav = N.id 
        WHERE P.view > 10 AND P.status=1 AND N.status=1 ORDER BY P.view desc ,P.id DESC LIMIT 5";
        $posts = array();
        $resultSQL = self::$db->getAll($sql);
        foreach ($resultSQL as $row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            $posts[] = $post;
        }
        return $posts;
    }
    function getSearch($keyWord) {
        $sql = "SELECT N.id as nav_id, P.* FROM tbl_post as P join tbl_navigation as N
        on P.id_nav = N.id
        WHERE P.status = 1 and N.status = 1 AND (`title` LIKE '%".$keyWord."%') ORDER BY P.priority DESC, P.id DESC";
        $posts = array();
        $resultSQL = self::$db->getAll($sql);
        foreach ($resultSQL as $row) {
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
            $view = $row['view'];
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, $time_last_update, $view);
            $posts[] = $post;
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