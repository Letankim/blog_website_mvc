function addComment(idUser, idPost) {
    const inputComment = $('.content-comment');
    const countComment = $('.count-comment i');
    const numberCommentInPost = $('.set-number-comment');
    let comment = inputComment.val();
    if(comment != '') {
        $.ajax({
            url: './viewUser/components/comment.php',
            type: 'POST',
            dataType: 'html',
            data: {
                comment: comment,
                idPost: idPost,
                idUser: idUser,
                time: new Date($.now()).toLocaleString()
            }
        }).done(function(result) {
            if(result.trim() !== "") {
                let commentNumber = parseInt(countComment.text()) + 1;
                countComment.html(commentNumber);
                numberCommentInPost.html(commentNumber);
                $('.list-comment').html(result);
                showSuccess("Bình luận thành công. Chờ kiểm duyệt.");
            } else {
                showError("Thêm bình luận này thất bại. Hãy thử lại.");
            }
        }).fail(function(error) {
            showError("Thêm bình luận này thất bại. Hãy thử lại.");
        });
    } else {
        alert("Hãy nhập nội dung vào ô bình luận");
    }
    clearInputComment()
}

function clearInputComment() {
    const inputComment = $('.content-comment');
    inputComment.val("");
}

function deleteComment(idComment, idPost, idUser) {
    const countComment = $('.count-comment i');
    const numberCommentInPost = $('.set-number-comment');
    if(confirm('Bạn có chắc muốn xóa bình luận này?')) {
        $.ajax({
            url: './viewUser/components/comment.php',
            type: 'POST',
            dataType: 'html',
            data: {
                idComment,
                idPost,
                idUser
            }
        }).done(function(result) {
            if(result.trim() !== "") {
                let commentNumber = parseInt(countComment.text()) - 1;
                countComment.html(commentNumber);
                numberCommentInPost.html(commentNumber);
                $('.list-comment').html(result);
                showSuccess("Xóa bình luận này thành công");
            } else {
                showError("Xóa bình luận này thất bại. Hãy thử lại.");
            }
        }).fail(function(error) {
            showError("Xóa bình luận này thất bại. Hãy thử lại.");
        });
    }
}

function editCommentSubmit(eleButton, idComment, idUser, idPost) {
    const commentNew = eleButton.parentElement.querySelector("input").value;
    $.ajax({
        url: './viewUser/components/editComment.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'idComment': idComment,
            'value': commentNew,
            'idUser': idUser,
            'idPost': idPost
        }
    }).done(function(result) {
        if(result.trim() !== "") {
            $('.list-comment').html(result);
            showSuccess("Cập nhật thành công. Chờ xét duyệt");
        } else {
            showError("Cập nhật bình luận này thất bại. Hãy thử lại.");
        }
    }).fail(function(error) {
        showError("Cập nhật bình luận này thất bại. Hãy thử lại.");
    });
}


const inputComment = $('.content-comment');
inputComment.keydown(function(e){
    if(e.keyCode === 13) {
        const btnSubmit = $('.input_submit');
        btnSubmit.click();
    }
});