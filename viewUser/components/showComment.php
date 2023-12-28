<?php
    function showComment($allComment, $allUser, $idPost,$idUser) {
    if(count($allComment) > 0) {
        foreach ($allComment as $comment) {
                $avatar = "";
                $username = "";
                foreach($allUser as $itemUser) {
                    if($itemUser->getId() == $comment->getIdUser()) {
                        $username = $itemUser->getUsername();
                        $avatar = $itemUser->getAvatar();
                        if($itemUser->getAvatar() == NULL) {
                            $avatar = "./uploads/default_avatar.jpg"; 
                        }
                        break;
                    }
                }
                if($idUser == $comment->getIdUser()) {
                    echo '<li class="comment-item">
                    <div class="avatar">
                        <img src="'.$avatar.'" alt="Avatar">
                    </div>
                    <div class="box-content-comment">
                        <p class="author-comment">
                            <span class="name">'.$username.'</span>
                            <span>'.$comment->getTime_comment().'</span>
                        </p>
                        <p class="content-comment">'.$comment->getComment().'</p>
                    </div>
                    <div class="action-comment">
                        <span class="delete-comment" onclick="deleteComment('.$comment->getId().', '.$comment->getIdPost().', '.$comment->getIdUser().')">Delete</span>
                        <span class="edit-comment" onclick="editComment(this, '.$comment->getId().', '.$idUser.', '.$idPost.')">Edit</span>
                    </div>
                </li>';
                } else {
                    echo '<li class="comment-item">
                    <div class="avatar">
                        <img src="'.$avatar.'" alt="Avatar">
                    </div>
                    <div class="box-content-comment">
                        <p class="author-comment">
                            <span class="name">'.$username.'</span>
                            <span>'.$comment->getTime_comment().'</span>
                        </p>
                        <p class="content-comment">'.$comment->getComment().'</p>
                    </div>
                    <div class="action-comment">
                    </div>
                </li>';
            }
        }
    } else {
        echo '<span class = "title-no-comment">
        Hãy trở thành người đầu tiên bình luận bài viết này.
    </span>';
    }
    }
?>