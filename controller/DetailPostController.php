<?php
require_once APP_ROOT."/DAO/NavigationDao.php";
require_once APP_ROOT."/DAO/PostDao.php";
require_once APP_ROOT."/DAO/UserDao.php";
require_once APP_ROOT."/DAO/CommentDao.php";
require_once APP_ROOT."/Lib/CreateLink.php";
class DetailPostController {
    public function detailPost() {
        $postDao = new PostDao();
        $userDao = new UserDao();
        $commentDao = new CommentDao();
        $createLink = new CreateLink();
        if(isset($_GET['id']) && $_GET['id']) {
            $id = $_GET['id'];
            $currentPost = $postDao->getOnePost($id);
            if($currentPost != null) {
                $relatedPost = $postDao->getRelatedPost($currentPost->getId_nav(), $id);
                $view = $currentPost->getView();
                $allCommentThisPost = $commentDao->getNumberCommentByIdPost($id);
                $userPosted = $userDao->getOneUser($currentPost->getId_user());
                $postDao->updateView($id, ($view + 1));
                $allUser = $userDao->getAllUsers();
                include_once APP_ROOT."/view/DetailPostView.php";
            } else {
                header("Location: ../404.html");
            }
        }
    }
}
?>