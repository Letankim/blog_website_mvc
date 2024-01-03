<div class="main_app">
    <div class="header_app">
        <h2 class="title">Popup</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="index.php?act=advertise" class = "form__add" method = 'POST' enctype="multipart/form-data">
                <div class="box_form form-group">
                    <span class="box_title">Tên chương trình: <span style="color:red">*</span></span>
                    <input id="name-program-input" required type="text" name = "name" class = "input" placeholder = "Enter your name program">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Đường dẫn: <span style="color:red">*</span></span>
                    <input id="link-program-input" required type="text" name = "link" class = "input" placeholder = "Enter your link program">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Ảnh quảng cáo: <span style="color:red">*</span></span>
                    <input id="img-program-input" required type="file" name = "image" class = "input input_files"  onchange="previewImage(event, '#box-preview-image')">
                    <div id="box-preview-image">

                    </div>
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form">
                    <select name="status" id="status_nav">
                        <option value="1">----Trạng thái----</option>
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="box_form">
                    <input id="btn-add-advertise" type="submit" value="Thêm" name = "add-advertise" class = "input input_submit">
                </div>
            </form>
        </div>
        <div class="show_list">
            <header>List advertiser</header>
            <div class="box-delete">
                <span onClick = "deleteByCheck('advertise')">Delete mục đã chọn</span>
                <span onClick = "deleteAll('advertise')">Delete tất cả</span>
            </div>
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
        btnAddAdvertise = document.querySelector('#btn-add-advertise');
        const messageName = "Hãy nhập thông tin cho trường này",
            messageLink = "Hãy nhập thông tin cho trường này",
            messageImg = "Hãy chọn đúng định dạng ảnh";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: nameProgram, message: messageName, regex:  /^.{1,}$/, type: "text"},
            { element: linkProgram, message: messageLink, regex:  /^.{1,}$/, type: "text"},
            { element: imgProgram, message: messageImg, regex:  null, type: "image"}
        ];
        validation(inputsToValidateCheck, btnAddAdvertise);
</script>