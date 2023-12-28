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
    $userDao = new UserDao();
    $idComment = $_POST['idComment'];
    $comment = $_POST['value'];
    $idPost = $_POST['idPost'];
    $idUser = $_POST['idUser'];
    $isDone = $commentDao->updateComment($idComment, $comment);
    if($isDone >= 1) {
        $allUser = $userDao->getAllUsers();
        showComment($commentDao->getNumberCommentByIdPost($idPost), $allUser, $idPost,$idUser);
    } else {
        echo "";
    }
?>
        
    