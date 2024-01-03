<?php
    $id  = $currentProduct->getId();
    $linkDemo = $currentProduct->getLink_demo();
    $linkCode = $currentProduct->getLink_code();
    $img = $currentProduct->getImg();
    $status = $currentProduct->getStatus();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Sản phẩm</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateProduct" method = 'POST' enctype="multipart/form-data">
            <div class="box_form form-group">
                <span class="box_title">Ảnh mô tả: <span style="color:red">*</span></span>
                <input type="hidden" name = "oldImg" value="<?=$img?>">
                <input id="img-product-input" type="file" name = "image" class = "input input_files"  onchange="previewImage(event, '#box-preview-image')">
                <div id="box-preview-image">
                    <img src="../uploads/<?=$img?>" alt="Banner" class="preview-image">
                </div>
                <span class = 'message_error'></span>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Link demo: <span style="color:red">*</span></span>
                <input id="demo-input" value="<?=$linkDemo?>" class = "input" type="text" placeholder="Link demo" name="link-demo">
                <input type="hidden" name="id" value="<?=$id?>">
                <span class = 'message_error'></span>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Link code: <span style="color:red">*</span></span>
                <input id="code-input" value="<?=$linkCode?>" class = "input" type="text" placeholder="Link code" name="link-code">
                <span class = 'message_error'></span>
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
                <input id="btn-update-product" type="submit" value="Thêm" name = "update-product" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Product</header>
            <?php
                // formFilterByStatus();
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
        demoProgram = document.querySelector('#demo-input'),
        imgProduct = document.querySelector('#img-product-input'),
        btnUpdateProduct = document.querySelector('#btn-update-product');
        const messageCode = "Hãy nhập thông tin cho trường này",
            messageDemo = "Hãy nhập thông tin cho trường này",
            messageImg = "Hãy chọn đúng định dạng ảnh";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: codeProgram, message: messageCode, regex:  /^.{1,}$/, type: "text"},
            { element: demoProgram, message: demoProgram, regex:  /^.{1,}$/, type: "text"},
            { element: imgProduct, message: messageImg, regex: null, type: "image"}
        ];
        validation(inputsToValidateCheck, btnUpdateProduct);
</script>