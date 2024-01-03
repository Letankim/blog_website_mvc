<link rel="stylesheet" href="./public/assets/css/personal.css">
<link rel="stylesheet" href="./public/assets/css/toast.css">
    <title>Cá nhân</title>
</head>
<body>
        <?php
            echo showHeaderNavigation();
        ?>
        <div id="toast">

        </div>
        <main>
            <div class="container">
                <div class="wrapper-personal">
                    <h1>Thông tin cá nhân</h1>
                    <div class="personal-content row">
                        <ul class="list-personal col-12 col-lg-4">
                            <li class="item-personal">
                                <span class="item-personal-title">Ảnh đại diện:</span>
                                <?php
                                        if($currentUser->getAvatar() != NULL){
                                            echo '<img src="'.$currentUser->getAvatar().'" alt="'.$currentUser->getName().'">';
                                        } else {
                                            echo '<img src="./uploads/default_avatar.jpg" alt="Avatar">';
                                        }
                                    ?>
                            </li>
                            <li class="item-personal">
                                <span class="item-personal-title">Tên đăng nhập:</span>
                                <p><?=$currentUser->getUsername()?></p>
                            </li>
                            <li class="item-personal">
                                <span class="item-personal-title">Họ và tên:</span>
                                <p><?=$currentUser->getName()?></p>
                            </li>
                            <li class="item-personal">
                                <span class="item-personal-title">Email:</span>
                                <p><?=$currentUser->getEmail()?></p>
                            </li>
                            <li class="item-personal update-information">
                                <span class="btn open-box open-box-update-information">Cập nhật thông tin</span>
                                <span class="btn open-box open-box-update-password">Cập nhật mật khẩu</span>
                            </li>
                        </ul>
                        
                        <div class="box-change-information change-information-user col-12 col-lg-8">
                            <h2>Thay đổi thông tin</h2>
                            <form class="box-change-input" method="post" action="./?act=updateInformationPersonal" enctype="multipart/form-data">
                                <div class="group-input form-group">
                                    <span class="title-input">Họ và tên:</span>
                                    <input name="id" type="hidden" value = "<?=$currentUser->getId()?>">
                                    <input id="namePersonal" name="name" required type="text" placeholder="Họ và tên" value = "<?=$currentUser->getName()?>">
                                    <span class = 'message_error'></span>
                                </div>
                                <div class="group-input form-group">
                                    <span class="title-input">Email:</span>
                                    <input <?=$currentUser->getIsGoogle() == 1 ? "readonly" : ""?> id="emailPersonal" 
                                    name="email" required type="email" placeholder="Email" value = "<?=$currentUser->getEmail()?>">
                                    <input name="oldImgPath" type="hidden" value = "<?=$currentUser->getAvatar()?>">
                                    <span class = 'message_error'></span>
                                </div>
                                <div class="group-input form-group">
                                    <span class="title-input">Ảnh đại diện:</span>
                                    <input id="avatarPersonal" name="avatar" class = "input-avatar" type="file" onchange="previewImage(event, '.box-preview')">
                                    <div class="box-preview">
                                        <?php
                                            if($currentUser->getAvatar() != null) {
                                                echo '<img class = "preview-image" src="'.$currentUser->getAvatar().'" alt="Avatar">';
                                            } else {
                                                echo '<img class = "preview-image" src="" alt="Avatar">';
                                            }
                                        ?>
                                    </div>
                                    <span class = 'message_error'></span>
                                </div>
                                <button class = "btn btn-update-personal" name = "update-information" type="submit">Cập nhật thông tin</button>
                            </form>
                        </div>
                        <div class="box-change-information change-password col-12 col-lg-8">
                            <h2>Thay đổi mật khẩu</h2>
                            <form class="box-change-input" method="post" action = "./?act=updateInformationPersonal">
                                <div class="group-input">
                                    <span class="title-input">Mật khẩu cũ</span>
                                    <input name="oldPassword" required type="password" placeholder="Mật khẩu cũ">
                                </div>
                                <div class="group-input">
                                    <span class="title-input">Mật khẩu mới:</span>
                                    <input id="password-new" name="newPassword" class = "new-password" required type="password" placeholder="Mật khẩu mới">
                                    <span style="color: red;" class="error-password"></span>
                                </div>
                                <button name = "update-password" class = "btn update-password-btn" type="submit">Cập nhật mật khẩu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- footer -->
        <?php
            footer();
        ?>
<script src="./public/assets/js/personal.js"></script>
<script src="./public/assets/js/toast.js"></script>
        <?php
            if(isset($_GET['status']) && $_GET['status'] == 'success') {
            $message = isset($_GET['message']) ? $_GET['message'] : "Update information success";
        ?>
        
        <script>
            showSuccess("<?=$message?>");
        </script>
            
        <?php
            } else if(isset($_GET['status']) && $_GET['status'] == 'fail') {
            $message = isset($_GET['message']) ? $_GET['message'] : "Update information fail. Try again";
        ?>
         <script>
            showError("<?=$message?>");
        </script>
        <?php
            }
        ?>
<script>
        const password = document.getElementById("password-new"), 
            buttonSubmit = document.querySelector('.update-password-btn');
        buttonSubmit.addEventListener("click", function(e) {
            const regex = /^[a-zA-Z0-9#@$&*!]{8,}$/;
            if(!password.value.match(regex)) {
                const error = document.querySelector(".error-password");
                error.innerHTML = "Mật khẩu phải từ 8 kí tự trở lên không cách";
                e.preventDefault();
            }
        })
        const nameCheck = document.getElementById('namePersonal'),
            emailCheck = document.getElementById('emailPersonal'),
            avatarCheck = document.getElementById('avatarPersonal'),
            submitBtnCheck = document.querySelector('.btn.btn-update-personal');
        const messageNameCheck = "Tên phải chứa ít nhất 2 kí tự và nhiều nhất 30 kí tự",
            messageEmailCheck = "Email không hợp lệ",
            messageAvatarCheck = "Vui lòng chọn đúng định dạng ảnh.";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: nameCheck, message: messageNameCheck, regex: /^.{2,30}$/, type: "text"},
            { element: emailCheck, message: messageEmailCheck, regex: /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/, type: "text"},
            { element: avatarCheck, message: messageAvatarCheck, regex: null, type: "image"}
        ];
        validation(inputsToValidateCheck, submitBtnCheck);
    </script>
</body>
</html>