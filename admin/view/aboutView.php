<div class="main_app">
    <div class="header_app">
        <h2 class="title">Giới thiệu</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="index.php?act=about" class = "form__add" method = 'POST' enctype="multipart/form-data">
                <div class="box_form form-group">
                    <span class="box_title">Ảnh mô tả: <span style="color:red">*</span></span>
                    <input id="image-input" required type="file" name = "image" class = "input input_files" onchange="previewImage(event, '#box-preview-image')">
                    <div id="box-preview-image">

                    </div>
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Nội dung mô tả: <span style="color:red">*</span></span>
                    <textarea id="content-input" required type="text" name = "content" class = "input" ></textarea>
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form">
                    <select name="status" id="status_nav">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="box_form">
                    <input id="btn-add-about" type="submit" value="Thêm" name = "add-about" class = "input input_submit">
                </div>
            </form>
        </div>
        <div class="show_list">
            <header>List Banner</header>
            <div class="box-delete">
                <span onClick = "deleteByCheck('introduction')">Delete mục đã chọn</span>
                <span onClick = "deleteAll('introduction')">Delete tất cả</span>
            </div>
            <?php
                formFilterByStatus();
            ?>
            <!-- show introduction  -->
            <?php
                showIntroduction($allIntro);
            ?>
        </div>
    </div>
</div>
<script>
    let contentCheck = document.querySelector('#content-input'),
        imgCheck = document.querySelector('#image-input'),
        btnAddAbout = document.querySelector('#btn-add-about');
        const messageContent = "Hãy nhập thông tin cho trường này",
            messageImg = "Hãy chọn hình ảnh đúng định dạng";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: contentCheck, message: messageContent, regex:  /^.{1,}$/, type: "text"},
            { element: imgCheck, message: messageImg, regex:  null, type: "image"},
        ];
        validation(inputsToValidateCheck, btnAddAbout);
</script>