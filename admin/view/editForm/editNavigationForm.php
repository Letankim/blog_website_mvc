<?php
    $id = $currentNav->getId();
    $name = $currentNav->getName();
    $status = $currentNav->getStatus();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Update navigation</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateNavigation" method = 'POST'>
            <div class="box_form form-group">
                <span class="box_title">Navigation: <span style="color:red">*</span></span>
                <input id="navigation-input" required type="text" name = "navigation" class = "input" value = "<?=$name?>" placeholder = "Enter your navigation">
                <input type="hidden" name="id" value = "<?=$id?>">
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
                <input id="update-navigation" type="submit" value="Update navigation" name = "update-navigation" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Post</header>
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
        btnAddNavigation = document.querySelector('#update-navigation');
        const messageNavigation = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: navigationCheck, message: messageNavigation, regex: /^.{1,}$/, type: "text"},
        ];
        validation(inputsToValidateCheck, btnAddNavigation);
</script>