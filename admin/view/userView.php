<div class="main_app">
    <div class="header_app">
        <h2 class="title">Tài khoản</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="?act=account" class = "form__add" method = 'POST'>
                <div class="box_form form-group">
                    <span class="box_title">Tên người dùng: <span style="color:red">*</span></span>
                    <input id="name-input" required type="text" name = "name" class = "input" placeholder = "Enter your name">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Email: <span style="color:red">*</span></span>
                    <input id="email-input" required type="text" name = "email" class = "input" placeholder = "Enter your email">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Username: <span style="color:red">*</span></span>
                    <input id="username-input" required type="text" name = "username" class = "input" placeholder = "Enter your username">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Password: <span style="color:red">*</span></span>
                    <input id="password-input" required type="text" name = "password" class = "input" placeholder = "Enter your password">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form">
                    <select name="role" id="status_nav">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                        <option value="2">High admin</option>
                    </select>
                </div>
                <div class="box_form">
                    <select name="status" id="status_nav">
                        <option value="0">Vô hiệu hóa</option>
                        <option value="1">Bình thường</option>
                    </select>
                </div>
                <div class="box_form">
                    <input id="btn-add-user" type="submit" value="Thêm" name = "add-user" class = "input input_submit">
                </div>
            </form>
        </div>
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
        passwordCheck = document.querySelector('#password-input'),
        btnAddUser = document.querySelector('#btn-add-user');
        const messageName = "Hãy nhập thông tin cho trường này",
            messageEmail = "Hãy nhập thông tin cho trường này",
            messageUsername = "Username phải ít nhất 5 kí tự",
            messagePassword = "Mật khẩu phải từ 8 kí tự trở lên";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: nameCheck, message: messageName, regex: /^.{1,}$/, type: "text"},
            { element: emailCheck, message: emailCheck, regex: /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/, type: "text"},
            { element: usernameCheck, message: usernameCheck, regex: /^.{5,}$/, type: "text"},
            { element: passwordCheck, message: passwordCheck, regex: /^.{8,}$/, type: "text"},
        ];
        validation(inputsToValidateCheck, btnAddUser);
</script>