<?php
    $id = $currentBanner->getId();
    $img = $currentBanner->getImg();
    $status = $currentBanner->getStatus();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Banner</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateBanner" method = 'POST' enctype="multipart/form-data">
            <div class="box_form form-group">
                <span class="box_title">Banner: <span style="color:red">*</span></span>
                <input id="banner-input" type="file" name = "image" class = "input input_files" onchange="previewImage(event, '#box-preview-image')">
                <input type="hidden" name = "oldImg" value="<?=$img?>">
                <div id="box-preview-image">
                        <img src="../uploads/<?=$img?>" alt="Banner" class="preview-image">
                </div>
                <span class = 'message_error'></span>
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
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
                <input type="hidden" name="id" value="<?=$id?>">
                <input id="btn-update-banner" type="submit" value="Update banner" name = "update-banner" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Banner</header>
            <?php
                formFilterByStatus();
            ?>
            <!-- show all banner -->
            <?php
                showBanner($allBanner);
            ?>
        </div>
    </div>
</div>
<script>
    let bannerCheck = document.querySelector('#banner-input'),
        btnAddBanner = document.querySelector('#btn-update-banner');
        const messageBanner = "Hãy chọn đúng định dạng là ảnh";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: bannerCheck, message: messageBanner, regex: null, type: "image"},
        ];
        validation(inputsToValidateCheck, btnAddBanner);
</script>