<div class="main_app">
    <div class="header_app">
        <h2 class="title">Bài viết</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="" class = "form__add" method = "POST" enctype="multipart/form-data">
                <div class="box_form">
                    <span class="box_title">Phân loại navigation: <span style="color:red">*</span></span>
                    <select name="navigation" id="status_nav">
                        <?php
                            foreach($allNav as $itemNav) {
                                echo '<option value="'.$itemNav->getId().'">'.$itemNav->getName().'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Tiêu đề bài viết: <span style="color:red">*</span></span>
                    <input id="title-input" required type="text" name = "title_post" class = "input" placeholder = "Enter your title...">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form content_box form-group">
                    <span class="box_title">Mô tả ngắn bài viết: <span style="color:red">*</span></span>
                    <textarea id="short-desc-input" required name="short_desc" style = "padding: 10px;"cols="30" rows="10"></textarea>
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form content_box form-group">
                    <span class="box_title">Nội dung bài viết: 
                        <span style="color:red">* Note: </span>
                        Khi thêm code phải theo format này: <?php
                         echo htmlspecialchars('<pre><code class="language-html">...</code></pre>');
                        ?>
                    </span>
                    <textarea required name="content" id="content_post" cols="30" rows="10"></textarea>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Ảnh đại diện: <span style="color:red">*</span></span>
                    <input id="img-post" required type="file" name = "image" class = "input input_files" onchange="previewImage(event, '#box-preview-image')">
                    <div id="box-preview-image">

                    </div>
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Lên lịch: <span style="color:red">*</span></span>
                    <input type="date" id="schedule" class="input" value="<?=date('Y-m-d'); ?>" name="schedule" min="<?=date('Y-m-d'); ?>">
                </div>
                <div class="box_form">
                    <select name="status" id="status_nav">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="box_form">
                    <select name="priority" id="status_nav">
                        <option value="0">Bình thường</option>
                        <option value="1">Ưu tiên</option>
                    </select>
                </div>
                <div class="box_form">
                    <input id="add-post-btn" type="submit" value="Thêm" name = "add-post" class = "input input_submit">
                </div>
            </form>
        </div>
        <div class="show_list">
            <header>List Post</header>
            <div class="box-delete">
                <span onClick = "deleteByCheck('post')">Delete mục đã chọn</span>
                <span onClick = "deleteAll('post')">Delete tất cả</span>
            </div>
            <!-- filter -->
            <div class="box_fill">
                <?php
                    formFilterByStatus();
                    formFilterPostByNavigation($allNav);
                ?>
            </div>
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
        btnAddPost = document.querySelector('#add-post-btn');
        const messageTitle = "Hãy nhập thông tin cho trường này",
            messageDesc = "Hãy nhập thông tin cho trường này",
            messageImg = "Hãy chọn đúng định dạng là ảnh";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: titleCheck, message: messageTitle, regex:  /^.{1,}$/, type: "text"},
            { element: shortDescCheck, message: messageDesc, regex:  /^.{1,}$/, type: "text"},
            { element: imgPost , message: messageImg, regex: null, type: "image"}
        ];
        validation(inputsToValidateCheck, btnAddPost);
</script>
<script src="../ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content_post');
</script>