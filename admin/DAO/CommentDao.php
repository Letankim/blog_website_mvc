<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Comment.php";
class CommentDao {
    private static $db;
    public function __construct()
    {
        $this->initializeConnection();
    }

    private function initializeConnection()
    {
        self::$db = new ConnectionAdmin();
    }

    function getOneComment($id) {
        $params = array(':id' => $id);
        $sql = "SELECT * FROM tbl_comment WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            $id = $row['id'];
            $idUser = $row['idUser'];
            $idPost = $row['idPost'];
            $comment = $row['comment'];
            $timeComment = $row['time_comment'];
            $status = $row['status'];
            $comment = new Comment($id, $idUser, $idPost, $comment, $timeComment, $status);
            return $comment;
        }
        return null;
    }
    function getAllCommentByIdPost($idPost) {
        $params = array(':idPost' => $idPost);
        $sql = "SELECT * FROM tbl_comment WHERE idPost =:idPost ORDER BY id DESC";
        $comments = array();
        $resultSQL = self::$db->getAll($sql, $params);
        foreach ($resultSQL as $row) {
            $id = $row['id'];
            $idUser = $row['idUser'];
            $idPost = $row['idPost'];
            $comment = $row['comment'];
            $timeComment = $row['time_comment'];
            $status = $row['status'];
            $comment = new Comment($id, $idUser, $idPost, $comment, $timeComment, $status);
            $comments[] = $comment;
        }
        return $comments;
    }

    function getAllCommentByStatus($status) {
        $params = array(':status' => $status);
        $sql = "SELECT * FROM tbl_comment WHERE status =:status ORDER BY id DESC";
        $comments = array();
        $resultSQL = self::$db->getAll($sql, $params);
        foreach ($resultSQL as $row) {
            $id = $row['id'];
            $idUser = $row['idUser'];
            $idPost = $row['idPost'];
            $comment = $row['comment'];
            $timeComment = $row['time_comment'];
            $status = $row['status'];
            $comment = new Comment($id, $idUser, $idPost, $comment, $timeComment, $status);
            $comments[] = $comment;
        }
        return $comments;
    }

    function updateStatusComment($id, $status) {
        $params = array(':id' => $id, ':status' => $status);
        $sql = "UPDATE tbl_comment SET status =:status WHERE id=:id";
        return self::$db->update($sql, $params);
    }
    
    function deleteComment($id) {
        $params = array(':id' => $id);
        $sql = "DELETE FROM tbl_comment WHERE id=:id";
        return self::$db->delete($sql, $params);
    }

    function deleteCommentPost($id) {
        $params = array(':id' => $id);
        $sql = "DELETE FROM tbl_comment WHERE idPost=:id";
        return self::$db->delete($sql, $params);
    }
}
?>