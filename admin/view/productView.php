<div class="main_app">
    <div class="header_app">
        <h2 class="title">Sản phẩm</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="index.php?act=product" class = "form__add" method = 'POST' enctype="multipart/form-data">
                <div class="box_form form-group">
                    <span class="box_title">Link demo: <span style="color:red">*</span></span>
                    <input id="demo-input" class = "input" type="text" placeholder="Link demo" name="link-demo">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form form-group">
                    <span class="box_title">Link code: <span style="color:red">*</span></span>
                    <input id="code-input" class = "input" type="text" placeholder="Link code" name="link-code">
                    <span class = 'message_error'></span>
                </div>
                <div class="box_form">
                    <select name="status" id="status_nav">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="box_form">
                    <input id="btn-add-product" type="submit" value="Thêm" name = "add-product" class = "input input_submit">
                </div>
            </form>
        </div>
        <div class="show_list">
            <header>List Product</header>
            <div class="box-delete">
                <span onClick = "deleteByCheck('product')">Delete mục đã chọn</span>
                <span onClick = "deleteAll('product')">Delete tất cả</span>
            </div>
            <?php
                formFilterByStatus();
            ?>
            <!-- show introduction  -->
            <?php
                showProduct($allProduct);
            ?>
        </div>
    </div>
</div>
<script>
    let codeProgram = document.querySelector('#code-input'),
        demoProgram = document.querySelector('#demo-input')
        btnAddProduct = document.querySelector('#btn-add-product');
        const messageCode = "Hãy nhập thông tin cho trường này",
            messageDemo = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: codeProgram, message: messageCode, regex:  /^.{1,}$/, type: "text"},
            { element: demoProgram, message: demoProgram, regex:  /^.{1,}$/, type: "text"}
        ];
        validation(inputsToValidateCheck, btnAddProduct);
</script>