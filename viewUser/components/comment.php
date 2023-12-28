<?php
    session_start();
    ob_start();
    require_once "../../config/config.php";
    require_once APP_ROOT."/DAO/CommentDao.php";
    require_once APP_ROOT."/DAO/UserDao.php";
    require_once APP_ROOT."/model/Comment.php";
    require_once APP_ROOT."/viewUser/components/showComment.php";
    $commentDao = new CommentDao();
    $userDao = new UserDao();
    $idPost = $_POST['idPost'];
    $idUser = $_POST['idUser'];
    $isDone = 0;
    if(isset($_POST['idComment'])) {
        $isDone = $commentDao->deleteComment($_POST['idComment']);
    } else {
        $comment = $_POST['comment'];
        $idUser = $_POST['idUser'];
        $time = $_POST['time'];
        $comment = new Comment(null,$idUser, $idPost, $comment, $time, 0);
        $isDone = $commentDao->addComment($comment);
    }
    if($isDone >= 1) {
        $allUser = $userDao->getAllUsers();
        showComment($commentDao->getNumberCommentByIdPost($idPost), $allUser, $idPost,$idUser);
    } else {
        echo "";
    }
?>
       