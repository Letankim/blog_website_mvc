<?php
    $id = $currentUser->getId();
    $name = $currentUser->getName();
    $email  = $currentUser->getEmail();
    $username = $currentUser->getUsername();
    $password = $currentUser->getPassword();
    $role = $currentUser->getRole();
    $status = $currentUser->getStatus();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Tài khoản</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateUser" method = 'POST'>
            <div class="box_form form-group">
                <span class="box_title">Tên người dùng: <span style="color:red">*</span></span>
                <input id="name-input" required type="text" value="<?=$name?>" name = "name" class = "input" placeholder = "Enter your name">
                <span class = 'message_error'></span>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Email: <span style="color:red">*</span></span>
                <input id="email-input" required type="text" value="<?=$email?>" name = "email" class = "input" placeholder = "Enter your email">
                <span class = 'message_error'></span>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Username: <span style="color:red">*</span></span>
                <input id="username-input" required type="text" value="<?=$username?>" name = "username" class = "input" placeholder = "Enter your username">
                <span class = 'message_error'></span>
            </div>
            <div class="box_form">
                <span class="box_title">Password: <span style="color:red">*</span></span>
                <input type="hidden" name = "oldPassword" class = "input"  value="<?=$password?>">
                <input type="text" aria-placeholder="Enter new password" name = "password" class = "input" placeholder = "Enter your password">
                <span class = 'message_error'></span>
            </div>
            <div class="box_form">
                <select name="role" id="status_nav">
                    <?php
                        if($role == 1) {
                            echo '<option value="1">----Vai trò----</option>
                            <option value="1" selected>Admin</option>';
                        } else {
                            echo '<option value="0">----Vai trò----</option>
                            <option value="1">Admin</option>
                            <option value="0" selected>User</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <option value="1">----Trạng thái----</option>
                    <?php
                        if($status == 1) {
                            echo '<option value="1" selected>Bình thường</option>';
                            if($role != 1) {
                                echo '<option value="0">Vô hiệu hóa</option>';
                            }   
                        } else {
                            echo '<option value="1">Bình thường</option>
                            <option value="0" selected>Vô hiệu hóa</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <input type="hidden" name = "id" value="<?=$id?>">
                <input id="btn-update-user" type="submit" value="Update User" name = "update-user" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List User</header>
            <?php
                formFilterByStatus();
            ?>
            <!-- show all account -->
            <?php
                showAccount($allUser);
            ?>
        </div>
    </div>
</div>
<script>
    let nameCheck = document.querySelector('#name-input'),
        emailCheck = document.querySelector('#email-input'),
        usernameCheck = document.querySelector('#username-input'),
        btnUpdateUser = document.querySelector('#btn-update-user');
        const messageName = "Hãy nhập thông tin cho trường này",
            messageEmail = "Hãy nhập thông tin cho trường này",
            messageUsername = "Username phải ít nhất 5 kí tự";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: nameCheck, message: messageName, regex: /^.{1,}$/, type: "text"},
            { element: emailCheck, message: emailCheck, regex: /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/, type: "text"},
            { element: usernameCheck, message: usernameCheck, regex: /^.{5,}$/, type: "text"}
        ];
        validation(inputsToValidateCheck, btnUpdateUser);
</script>