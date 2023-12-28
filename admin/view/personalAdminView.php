<?php
    $id = $currentUser->getId();
    $username = $currentUser->getUsername();
    $name = $currentUser->getName();
    $email = $currentUser->getEmail();
    $avatar = $currentUser->getAvatar();
    $password = $currentUser->getPassword();
?>
<style>
    .preview-image{
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
</style>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Chỉnh sửa thông tin cá nhân</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <form action="?act=personal-admin" class = "form__add" method = 'POST' style="display: flex;" enctype="multipart/form-data">
                <div class="box_form form-group">
                    <span class="box_title">Tên người dùng: <span style="color:red">*</span></span>
                    <input id="name-input" required type="text" name = "name" value="<?=$name?>" class = "input" placeholder = "Enter your name">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Email: <span style="color:red">*</span></span>
                    <input id="email-input" required type="text" name = "email" value="<?=$email?>" class = "input" placeholder = "Enter your email">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form">
                    <span class="box_title">Username: <span style="color:red">* Không sửa được username</span></span>
                    <input readonly type="text" name = "username" value="<?=$username?>" class = "input" placeholder = "Enter your username">
                </div>
                <div class="box_form">
                    <span class="box_title">Password: </span>
                    <input type="hidden" name="oldPassword" value="<?=$password?>">
                    <input type="text" name = "password"  class = "input" placeholder = "Enter your password">
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Avatar: </span>
                    <input id="img-input" type="file" name = "image" class = "input input_files" onchange="previewImage(event, '#box-preview-image')">
                    <input type="hidden" name = "oldImg" value="<?=$avatar?>">
                    <div id="box-preview-image">
                        <img src="../uploads/<?=$avatar?>" alt="" class="preview-image">
                    </div>
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form">
                    <input type="hidden" name = "id" value="<?=$id?>">
                    <input id="btn-update-personal" type="submit" value="Lưu" name = "update-personal" class = "input input_submit">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    let nameCheck = document.querySelector('#name-input'),
        emailCheck = document.querySelector('#email-input'),
        imgCheck = document.querySelector('#img-input'),
        btnUpdatePersonal = document.querySelector('#btn-update-personal');
        const messageName = "Hãy nhập thông tin cho trường này",
            messageEmail = "Hãy nhập thông tin cho trường này",
            messageImg = "Hãy chọn đúng định dạng ảnh";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: nameCheck, message: messageName, regex:  /^.{1,}$/, type: "text"},
            { element: emailCheck, message: emailCheck, regex:  /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/, type: "text"},
            { element: imgCheck, message: messageImg, regex: null, type: "image"},
        ];
        validation(inputsToValidateCheck, btnUpdatePersonal);
</script>