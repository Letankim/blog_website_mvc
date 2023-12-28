<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Post.php";
class PostDao {
    private static $db;
    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new ConnectionAdmin();
    }

    function getAllPost() {
        $sql = "SELECT * FROM tbl_post ORDER BY id DESC";
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
    function getAllPostActive() {
        $sql = "SELECT * FROM tbl_post JOIN tbl_navigation ON tbl_post.id_nav = tbl_navigation.id WHERE tbl_post.status=1 AND tbl_navigation.status=1 ORDER BY tbl_post.id DESC";
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

    function getFilterPostByStatus($status) {
        $params = array(':status' => $status);
        $sql = "SELECT * FROM tbl_post WHERE status=:status ORDER BY id DESC";
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
    
    function getOnePost($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_post WHERE id=:id";
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
        $params = array(
            ":idNav"=>$idNav
        );
        $sql = "SELECT * FROM tbl_post WHERE id_nav=:idNav";
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
    
    function addPost($post) {
        $params = array(
            ":idNav"=>$post->getId_nav(),
            ":idUser"=>$post->getId_user(),
            ":title"=>$post->getTitle(),
            ":priority"=>$post->getPriority(),
            ":shortDesc"=>$post->getShortDesc(),
            ":content"=>$post->getContent(),
            ":img"=>$post->getImg(),
            ":status"=>$post->getStatus(),
            ":date"=>$post->getTime_post(),
        );
        $sql = "INSERT INTO tbl_post (title, shortDesc, content, img, status, id_nav, time_post, priority, id_user) 
        VALUES (:title, :shortDesc, :content, :img, :status, :idNav, :date, :priority, :idUser)";
        return self::$db->insert($sql, $params);
    }
    
    function updatePost($post) {
        $params = array(
            ":id"=>$post->getId(),
            ":idNav"=>$post->getId_nav(),
            ":idUser"=>$post->getId_user(),
            ":title"=>$post->getTitle(),
            ":priority"=>$post->getPriority(),
            ":shortDesc"=>$post->getShortDesc(),
            ":content"=>$post->getContent(),
            ":img"=>$post->getImg(),
            ":status"=>$post->getStatus(),
            ":date"=>$post->getTime_post(),
            ":view"=>$post->getView(),
        );
        $sql ="UPDATE tbl_post SET title=:title, shortDesc=:shortDesc,content=:content, img=:img, status=:status, id_nav =:idNav, id_user=:idUser,time_last_update =:date, view=:view, priority=:priority WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function updateStatusPost($id, $status) {
        $params = array(
            ":id"=>$id,
            ":status"=>$status
        );
        $sql = "UPDATE tbl_post SET status=:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function updatePriorityPost($id, $priority) {
        $params = array(
            ":id"=>$id,
            ":priority"=>$priority
        );
        $sql = "UPDATE tbl_post SET priority=:priority WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    function deletePost($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_post WHERE id=:id";
        return self::$db->delete($sql, $params);
    } 

    function deleteAllPost() {
        $sql = "DELETE FROM tbl_post";
        return self::$db->delete($sql);
    }

    function getPostByDate($date, $now) {
        // $params = array(":date"=>$date,":now"=>$now);
        $sql = "SELECT * FROM tbl_post WHERE DATE(time_post) BETWEEN '$date' AND '$now' ORDER BY id DESC";
        return getAll($sql);
    }
}
?>