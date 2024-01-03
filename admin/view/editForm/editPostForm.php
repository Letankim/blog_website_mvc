<?php
    $id = $currentPost->getId();
    $title = $currentPost->getTitle();
    $content = $currentPost->getContent();
    $shortDesc = $currentPost->getShortDesc();
    $status = $currentPost->getStatus();
    $img = $currentPost->getImg();
    $view = $currentPost->getView();
    $idNav = $currentPost->getId_nav();
    $priority = $currentPost->getPriority();
    $schedule = $currentPost->getSchedule();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Cập nhật bài viết</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updatePost" method = 'POST' enctype="multipart/form-data">
            <div class="box_form">
                <span class="box_title">Phân loại navigation: <span style="color:red">*</span></span>
                <select name="navigation" id="status_nav">
                    <option value="<?=$idNav?>">----Trạng thái----</option>
                    <?php
                        foreach($allNav as $itemNav) {
                            if($itemNav->getId() == $idNav) {
                                echo '<option value="'.$itemNav->getId().'" selected>'.$itemNav->getName().'</option>';
                            } else {
                                echo '<option value="'.$itemNav->getId().'">'.$itemNav->getName().'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Tiêu đề bài viết: <span style="color:red">*</span></span>
                <input id="title-input" required type="text" name = "title_post" value="<?=$title?>" class = "input" placeholder = "Enter your title...">
                <span class = 'message_error'></span>
            </div>
            <div class="box_form content_box form-group">
                <span class="box_title">Mô tả ngắn bài viết: <span style="color:red">*</span></span>
                <textarea id="short-desc-input" required name="short_desc" style = "padding: 10px;"cols="30" rows="10"><?=$shortDesc?></textarea>
                <span class = 'message_error'></span>
            </div>
            <div class="box_form content_box">
                <span class="box_title">Nội dung bài viết: <span style="color:red">* Note: </span>
                        Khi thêm code phải theo format này: <?php
                         echo htmlspecialchars('<pre><code class="language-html">...</code></pre>');
                        ?></span>
                <textarea required name="content" id="content_post" cols="30" rows="10"><?=$content?></textarea>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Ảnh đại diện: <span style="color:red">*</span></span>
                <input id="img-post" type="file" name = "image" class = "input input_files" onchange="previewImage(event, '#box-preview-image')">
                <input type="hidden" name="view" value = "<?=$view?>">
                <input type="hidden" name="oldImg" value = "<?=$img?>">
                <div id="box-preview-image">
                    <img src="../uploads/<?=$img?>" alt="Post" class="preview-image">
                </div>
                <span class = 'message_error'></span>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Lên lịch: <span style="color:red">*</span></span>
                <input type="date" id="schedule" class="input" value="<?=$schedule ?>" name="schedule" min="<?=date('Y-m-d'); ?>">
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
                <select name="priority" id="status_nav">
                    <?php
                        if($priority == 1) {
                            echo '<option value="1" selected>Ưu tiên</option>
                                <option value="0">Bình thường</option>';
                        } else {
                            echo '<option value="1">Ưu tiên</option>
                            <option value="0" selected>Bình thường</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <input type="hidden" name="id" value="<?=$id?>">
                <input id="btn-update-post" type="submit" value="Cập nhật" name = "update-post" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Navigation</header>
            <!-- filter -->
            <?php
                formFilterByStatus();
            ?>
            <?php
                showPost($allPost);
            ?>
        </div>
    </div>
</div>
<script>
    let titleCheck = document.querySelector('#title-input'),
        shortDescCheck = document.querySelector('#short-desc-input'),
        imgPost = document.querySelector('#img-post'),
        btnUpdatePost = document.querySelector('#btn-update-post');
        const messageTitle = "Hãy nhập thông tin cho trường này",
            messageDesc = "Hãy nhập thông tin cho trường này",
            messageImg = "Hãy chọn đúng định dạng là ảnh";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: titleCheck, message: messageTitle, regex:  /^.{1,}$/, type: "text"},
            { element: shortDescCheck, message: messageDesc, regex:  /^.{1,}$/, type: "text"},
            { element: imgPost , message: messageImg, regex: null, type: "image"}
        ];
        validation(inputsToValidateCheck, btnUpdatePost);
</script>
<script src="../ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content_post');
</script>