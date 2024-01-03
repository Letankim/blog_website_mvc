<div class="main_app">
    <div class="header_app">
        <h2 class="title">Danh mục</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="index.php?act=navigation" class = "form__add" method = 'POST'>
                <div class="box_form form-group">
                    <span class="box_title">Navigation: <span style="color:red">*</span></span>
                    <input required id="navigation-input" type="text" name="navigation" class = "input" placeholder = "Enter your navigation">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form">
                    <select name="status" id="status_nav">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="box_form">
                    <input type="submit" id="add-navigation" value="Thêm" name = "add-navigation" class = "input input_submit">
                </div>
            </form>
        </div>
        <div class="show_list">
            <header>List Navigation</header>
            <div class="box-delete">
                <span onClick = "deleteByCheck('navigation')">Delete mục đã chọn</span>
                <span onClick = "deleteAll('navigation')">Delete tất cả</span>
            </div>
            <?php
                formFilterByStatus();
            ?>
            <!-- show all navigation -->
            <?php
                showNavigation($allNav);
            ?>
        </div>
    </div>
</div>
<script>
    let navigationCheck = document.querySelector('#navigation-input'),
        btnAddNavigation = document.querySelector('#add-navigation');
        const messageNavigation = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: navigationCheck, message: messageNavigation, regex: /^.{1,}$/, type: "text"},
        ];
        validation(inputsToValidateCheck, btnAddNavigation);
</script>