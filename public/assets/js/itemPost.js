const allImg = document.querySelectorAll(".details-post img"),
    boxPreview = document.querySelector(".preview-img");
if(allImg) {
    const mainImgPreview = boxPreview.querySelector("img"),
        btnClose = boxPreview.querySelector('.box-close'),
        overlay = boxPreview.querySelector(".overlay");
    allImg.forEach(function(img) {
        img.addEventListener('click', function() {
            boxPreview.classList.add('active');
            mainImgPreview.src = img.src;
        });
    });
    btnClose.addEventListener('click', function() {
        boxPreview.classList.remove('active');
        mainImgPreview.src = "";
    });
    overlay.addEventListener('click', function() {
        boxPreview.classList.remove('active');
        mainImgPreview.src = "";
    });
}

// show tag copy
//  show tag code

const code = document.querySelectorAll('pre code');

code.forEach((item) => {
    let copy = document.createElement("a");
    copy.href = "#";
    copy.innerHTML = `<i class='bx bx-copy-alt'></i>
                    <span>Copy</span>`;
    copy.classList.add("copy_btn");
    copy.addEventListener("click", (e)=> {
        e.preventDefault();
        let text = item.innerText.trim();
        let textarea = document.createElement('textarea');
        document.body.appendChild(textarea);
        textarea.value = text;
        textarea.select();
        document.execCommand('copy'); 
        textarea.remove();
        copy.innerHTML = `<i class='bx bx-check'></i>
        <span>Copied</span>`;
        setTimeout(function() {
            copy.innerHTML = `<i class='bx bx-copy-alt'></i>
            <span>Copy</span>`;
        }, 1000);
    })
    item.parentElement.insertBefore(copy, item);
});


// edit comment
const editComment = (ele, idComment, idUser, idPost) => {
    const parentEle = ele.parentElement.parentElement;
    const boxShowEditComment = parentEle.querySelector(".box-content-comment");
    const comment = parentEle.querySelector(".content-comment").innerText;
    const wrapperEditComment = document.createElement("div");
    wrapperEditComment.setAttribute("class", "wrapper-edit-comment");
    const inputEditComment = document.createElement("input");
    const buttonSubmitEdit = document.createElement("button");
    buttonSubmitEdit.setAttribute("onclick", `editCommentSubmit(this, ${idComment}, ${idUser}, ${idPost})`);
    buttonSubmitEdit.innerText = "Cập nhật";
    inputEditComment.type = "text";
    inputEditComment.value = comment;
    boxShowEditComment.innerHTML = '';
    wrapperEditComment.appendChild(inputEditComment);
    wrapperEditComment.appendChild(buttonSubmitEdit);
    boxShowEditComment.appendChild(wrapperEditComment);
}