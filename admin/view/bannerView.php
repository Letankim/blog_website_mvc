<div class="main_app">
    <div class="header_app">
        <h2 class="title">Banner</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="?act=banner" class = "form__add" method = 'POST' enctype="multipart/form-data">
                <div class="box_form form-group">
                    <span class="box_title">Banner: <span style="color:red">*</span></span>
                    <input id="banner-input" required type="file" name = "image" class = "input input_files" onchange="previewImage(event, '#box-preview-image')">
                    <div id="box-preview-image">

                    </div>
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form">
                    <select name="status" id="status_nav">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="box_form">
                    <input id="add-banner" type="submit" value="Thêm" name = "add-banner" class = "input input_submit">
                </div>
            </form>
        </div>
        <div class="show_list">
            <header>List Banner</header>
            <div class="box-delete">
                <span onClick = "deleteByCheck('banner')">Delete mục đã chọn</span>
                <span onClick = "deleteAll('banner')">Delete tất cả</span>
            </div>
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
        btnAddBanner = document.querySelector('#add-banner');
        const messageBanner = "Hãy chọn đúng định dạng là ảnh";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: bannerCheck, message: messageBanner, regex: null, type: "image"},
        ];
        validation(inputsToValidateCheck, btnAddBanner);
</script>