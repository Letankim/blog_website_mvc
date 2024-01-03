<?php
require_once PATH_ROOT_ADMIN."/DAO/PostDao.php";
require_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
require_once PATH_ROOT_ADMIN."/DAO/UserDao.php";
require_once PATH_ROOT_ADMIN."/DAO/CommentDao.php";
include PATH_ROOT_ADMIN."/view/handleShow/showPost.php";
require_once PATH_ROOT."/Lib/Upload.php";
require_once PATH_ROOT."/Lib/Time.php";
require_once PATH_ROOT."/model/Post.php";
class PostAdminController {
    public function adminPost() {
        $postDao = new PostDao();
        $navigationDao = new NavigationDao();
        $allPost = $postDao->getAllPost();
        $allNav = $navigationDao->getAllNav();
        include PATH_ROOT_ADMIN."/view/postView.php";
    }

    public function adminAddPost() {
        $postDao = new PostDao();
        $upload = new Upload();
        $id_nav = $_POST['navigation'];
        $id_user = $_SESSION['idAdmin'];
        $title = $_POST['title_post'];
        $shortDesc = $_POST['short_desc'];
        $content = $_POST['content'];
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        $schedule = $_POST['schedule'];
        $time_post= getCurrentTime();
        // upload ảnh
        $target_dir = "../uploads/";
        $img = $upload->uploadImage($target_dir, $_FILES['image']);
        $post = new Post(null, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, $id_user, $time_post, null, null, 0, $schedule);
        $isDone = $postDao->addPost($post);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("location: ?act=post&status=".$type);
    }

    public function adminDetailPost() {
        if(isset($_GET['id']) && $_GET['id']) {
            $id = $_GET['id'];
            $postDao = new PostDao();
            $currentPost = $postDao->getOnePost($id);
            include_once PATH_ROOT_ADMIN."/view/detailPostView.php";
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminCommentPost() {
        if(isset($_GET['id']) && $_GET['id']) {
            require_once "./DAO/UserDao.php";
            $id = $_GET['id'];
            $postDao = new PostDao();
            $commentDao = new CommentDao();
            $currentPost = $postDao->getOnePost($id);
            $allComment = $commentDao->getAllCommentByIdPost($id);
            include_once PATH_ROOT_ADMIN."/view/commentPostView.php";
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminBanCommentPost() {
        if(isset($_GET['id']) && $_GET['id'] && isset($_GET['type']) && $_GET['type']) {
            $id = $_GET['id'];
            $type = $_GET['type'];
            $commentDao = new CommentDao();
            $currentComment = $commentDao->getOneComment($id);
            $idPost = $currentComment->getIdPost();
            $status = $currentComment->getStatus($id);
            $status = $type == "allow" ? 1 : 2;
            $isDone = $commentDao->updateStatusComment($id, $status);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: ?act=commentPost&id=".$idPost."&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminDeleteCommentPost() {
        if(isset($_GET['id']) && $_GET['id']) {
            $id = $_GET['id'];
            $commentDao = new CommentDao();
            $currentComment = $commentDao->getOneComment($id);
            $idPost = $currentComment->getIdPost();
            $status = $currentComment->getStatus($id);
            $status = $status == 1 ? 0 :  1;
            $isDone = $commentDao->deleteComment($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: ?act=commentPost&id=".$idPost."&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminEditFormPost() {
        if(isset($_GET['id']) && $_GET['id']) {
            $postDao = new PostDao();
            $navigationDao = new NavigationDao();
            $id = $_GET['id'];
            $currentPost = $postDao->getOnePost($id);
            $allPost = $postDao->getAllPost();
            $allNav = $navigationDao->getAllNav();
            include_once PATH_ROOT_ADMIN."/view/editForm/editPostForm.php";
        } else {
            header("location: ?act=404");
        }
    }

    public function adminUpdatePost() {
        if(isset($_POST['update-post']) && $_POST['update-post']) {
            $postDao = new PostDao();
            $upload = new Upload();
            $id = $_POST['id'];
            $id_nav = $_POST['navigation'];
            $title = $_POST['title_post'];
            $shortDesc = $_POST['short_desc'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $priority = $_POST['priority'];
            $view = $_POST['view'];
            $schedule = $_POST['schedule'];
            $time_update= getCurrentTime();
            $idAdmin = $_SESSION['idAdmin'];
            // upload ảnh
            $target_dir = "../uploads/";
            $img = $upload->uploadImage($target_dir, $_FILES['image']);
            if($img ==  "") {
                $img =   $_POST['oldImg'];
            }
            $post = new Post($id, $title, $shortDesc, $img, $content, $status, $priority, $id_nav, null, null, $time_update,$idAdmin, $view, $schedule);
            $isDone = $postDao->updatePost($post);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=post&status=".$type);
        } else {
            header("location: ?act=404");
        }
    }

    public function adminDeletePost() {
        if(isset($_GET['id']) && $_GET['id']) {
            $postDao = new PostDao();
            $commentDao = new CommentDao();
            $id = $_GET['id'];
            $isDone = $postDao->deletePost($id);
            $commentDao->deleteCommentPost($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("location: ?act=post&status=".$type);
        } else  {
            header("location: ?act=404");
        }
    }
}
?>