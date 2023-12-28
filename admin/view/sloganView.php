<div class="main_app">
    <div class="header_app">
        <h2 class="title">Slogan</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="index.php?act=slogan" class = "form__add" method = 'POST'>
                <div class="box_form form-group">
                    <span class="box_title">Top Slogan: <span style="color:red">*</span></span>
                    <input id="top-slogan-input" required type="text" name = "topSlogan" class = "input" placeholder = "Enter your top slogan">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Bottom Slogan: <span style="color:red">*</span></span>
                    <input id="bottom-slogan-input" required type="text" name = "bottomSlogan" class = "input" placeholder = "Enter your bottom slogan">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form">
                    <select name="status" id="status_nav">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="box_form">
                    <input id="btn-add-slogan" type="submit" value="Thêm" name = "add-slogan" class = "input input_submit">
                </div>
            </form>
        </div>
        <div class="show_list">
            <header>List Slogan</header>
            <div class="box-delete">
                <span onClick = "deleteByCheck('slogan')">Delete mục đã chọn</span>
                <span onClick = "deleteAll('slogan')">Delete tất cả</span>
            </div>
            <?php
                formFilterByStatus();
            ?>
            <?php
                showSlogan($allSlogan);
            ?>
        </div>
    </div>
</div>
<script>
    let topSlogan = document.querySelector('#top-slogan-input'),
        bottomSlogan = document.querySelector('#bottom-slogan-input'),
        btnAddAbout = document.querySelector('#btn-add-slogan');
        const messageTopSlogan = "Hãy nhập thông tin cho trường này",
            messageBottomSlogan = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: topSlogan, message: messageTopSlogan, regex:  /^.{1,}$/, type: "text"},
            { element: bottomSlogan, message: messageBottomSlogan, regex:  /^.{1,}$/, type: "text"}
        ];
        validation(inputsToValidateCheck, btnAddAbout);
</script>