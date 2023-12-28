<?php
    $id = $currentSlogan->getId();
    $topSlogan = $currentSlogan->getTopslogan();
    $bottomSlogan  = $currentSlogan->getBottomslogan();
    $status = $currentSlogan->getStatus();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Slogan</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateSlogan" method = 'POST'>
            <div class="box_form form-group">
                <span class="box_title">Top Slogan: <span style="color:red">*</span></span>
                <input id="top-slogan-input" required type="text" value = "<?=$topSlogan?>" name = "topSlogan" class = "input" placeholder = "Enter your top slogan">
                <span class = 'message_error'></span>
            </div>
            <div class="box_form form-group">
                <span class="box_title">Bottom Slogan: <span style="color:red">*</span></span>
                <input id="bottom-slogan-input" required type="text" value = "<?=$bottomSlogan?>" name = "bottomSlogan" class = "input" placeholder = "Enter your bottom slogan">
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
                <input type="hidden" name="id" value = "<?=$id?>">
                <input id="btn-update-slogan" type="submit" value="Thêm" name = "update-slogan" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Slogan</header>
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
        btnUpdateAbout = document.querySelector('#btn-update-slogan');
        const messageTopSlogan = "Hãy nhập thông tin cho trường này",
            messageBottomSlogan = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: topSlogan, message: messageTopSlogan, regex:  /^.{1,}$/, type: "text"},
            { element: bottomSlogan, message: messageBottomSlogan, regex:  /^.{1,}$/, type: "text"}
        ];
        validation(inputsToValidateCheck, btnUpdateAbout);
</script>