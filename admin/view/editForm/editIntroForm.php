<?php
    $id = $currentIntroduction->getId();
    $img = $currentIntroduction->getImg();
    $content = $currentIntroduction->getContent();
    $status = $currentIntroduction->getStatus();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Introduction</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateIntro" method = 'POST' enctype="multipart/form-data">
            <div class="box_form form-group">
                <span class="box_title">Ảnh mô tả: <span style="color:red">*</span></span>
                <input type="hidden" name = "oldImg" class = "input input_files" value="<?=$img?>">
                <input id="image-input" type="file" name = "image" class = "input input_files"  onchange="previewImage(event, '#box-preview-image')">
                <div id="box-preview-image">
                    <img src="../uploads/<?=$img?>" alt="" class="preview-image">
                </div>
                <span class = 'message_error'></span>
            </div>
            <div class="box_form form-group">
                <input type="hidden" name="id" value="<?=$id?>">
                <span class="box_title">Nội dung mô tả: <span style="color:red">*</span></span>
                <textarea id="content-input" required type="text" name = "content" class = "input" ><?=$content?></textarea>
                <span class = 'message_error'></span>
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                <option value="1">----Trạng thái----</option>
                    <?php
                        if($status == 1) {
                            echo '<option value="1" selected>Đang hiển thị</option>
                            <option value="0">Đang ẩn</option>';
                        } else {
                            echo '<option value="1">Đang hiển thị</option>
                            <option value="0" selected>Đang ẩn</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <input id="btn-update-about" type="submit" value="Update Introduction" name = "update-about" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Banner</header>
            <?php
                formFilterByStatus();
            ?>
            <?php
                showIntroduction($allIntro);
            ?>
        </div>
    </div>
</div>
<script>
    let contentCheck = document.querySelector('#content-input'),
        imgCheck = document.querySelector('#image-input'),
        btnUpdateAbout = document.querySelector('#btn-update-about');
        const messageContent = "Hãy nhập thông tin cho trường này",
            messageImg = "Hãy chọn hình ảnh đúng định dạng";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: contentCheck, message: messageContent, regex:  /^.{1,}$/, type: "text"},
            { element: imgCheck, message: messageImg, regex:  null, type: "image"},
        ];
        validation(inputsToValidateCheck, btnUpdateAbout);
</script>