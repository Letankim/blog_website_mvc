<?php
    $id = $currentAdvertise->getId();
    $name = $currentAdvertise->getName_program();
    $img = $currentAdvertise->getImg();
    $link = $currentAdvertise->getLink();
    $status = $currentAdvertise->getStatus();
    $date = $currentAdvertise->getDate();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Advertise</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateAdver" method = 'POST' enctype="multipart/form-data">
            <div class="box_form form-group">
                <span class="box_title">Tên chương trình: <span style="color:red">*</span></span>
                <input id="name-program-input" required type="text" value="<?=$name?>" name = "name" class = "input" placeholder = "Enter your name program">
                <span class = 'message_error'></span>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Đường dẫn: <span style="color:red">*</span></span>
                <input id="link-program-input" required type="text" value="<?=$link?>" name = "link" class = "input" placeholder = "Enter your link program">
                <span class = 'message_error'></span>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Ảnh quảng cáo: <span style="color:red">*</span></span>
                <input type="hidden" name = "oldImg" value="<?=$img?>">
                <input id="img-program-input" type="file" name = "image" class = "input input_files"  onchange="previewImage(event, '#box-preview-image')">
                <div id="box-preview-image">
                    <img src="../uploads/<?=$img?>" alt="Post" class="preview-image">
                </div>
                <span class = 'message_error'></span>
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <?php
                        if($status == 1) {
                            echo '<option value="1" selected>Hiển thị</option>
                            <option value="0">Ẩn</option>';
                        } else {
                            echo '<option value="1">Hiển thị</option>
                            <option value="0" selected>Ẩn</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <input type="hidden" name="id" value = "<?= $id?>">
                <input id="btn-update-advertise" type="submit" value="Update" name = "update-advertise" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List advertiser</header>
            <?php
                formFilterByStatus();
            ?>
            <!-- show advertise -->
            <?php
                showAdvertise($allAdver);
            ?>
        </div>
    </div>
</div>
<script>
    let nameProgram = document.querySelector('#name-program-input'),
        linkProgram = document.querySelector('#link-program-input'),
        imgProgram = document.querySelector('#img-program-input'),
        btnUpdateAdvertise = document.querySelector('#btn-update-advertise');
        const messageName = "Hãy nhập thông tin cho trường này",
            messageLink = "Hãy nhập thông tin cho trường này",
            messageImg = "Hãy chọn đúng định dạng ảnh";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: nameProgram, message: messageName, regex:  /^.{1,}$/, type: "text"},
            { element: linkProgram, message: messageLink, regex:  /^.{1,}$/, type: "text"},
            { element: imgProgram, message: messageImg, regex:  null, type: "image"}
        ];
        validation(inputsToValidateCheck, btnUpdateAdvertise);
</script>