<?php
require_once APP_ROOT."/DBConnection/Connection.php";
require_once APP_ROOT."/model/Comment.php";
class CommentDao {
    private static $db;

    public function __construct() {
        $this->initializeConnection();
    }

    private function initializeConnection() {
        self::$db = new Connection();
    }
    
    function getOneComment($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_comment WHERE id=:id";
        $resultSQL = self::$db->get_one($sql, $params);
        if($resultSQL) {
            $id = $resultSQL['id'];
            $idUser = $resultSQL['idUser'];
            $idPost = $resultSQL['idPost'];
            $comment = $resultSQL['comment'];
            $time_comment = $resultSQL['time_comment'];
            $comment = new Comment($id, $idUser, $idPost, $comment, $time_comment);
            return $comment;
        }
        return null;
    }

    function addComment($comment) {
        $commentAfterRemoveHTML = self::$db->filterHtml($comment->getComment());
        $params = array(
            ":idUser"=>$comment->getIdUser(),
            "idPost"=>$comment->getIdPost(),
            ":comment"=>$commentAfterRemoveHTML,
            "time_comment"=>$comment->getTime_comment(),
            "status"=>$comment->getStatus()
        );
        $sql = "INSERT INTO tbl_comment (comment, idUser, idPost, time_comment, status) 
        VALUES (:comment, :idUser, :idPost, :time_comment, :status)";
        return self::$db->insert($sql, $params);
    }

    function deleteComment($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_comment WHERE id=:id";
        return self::$db->delete($sql, $params);
    }

    function getNumberCommentByIdPost($idPost){
        $params = array(":idPost"=>$idPost);
        $sql = "SELECT C.* FROM tbl_comment as C join tbl_post as P ON C.idPost = P.id WHERE idPost = :idPost and C.status=1 ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql, $params);
        $comments = array();
        foreach ($resultSQL as $row) {
            $id = $row['id'];
            $idUser = $row['idUser'];
            $idPost = $row['idPost'];
            $comment = $row['comment'];
            $time_comment = $row['time_comment'];
            $comment = new Comment($id, $idUser, $idPost, $comment, $time_comment);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function updateComment($id, $comment) {
        $params = array('id' => $id, 'comment' => $comment);
        $sql = "UPDATE tbl_comment SET comment=:comment, status=0 where id=:id";
        return self::$db->update($sql, $params);
    }
}
?>