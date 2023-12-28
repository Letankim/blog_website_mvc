</div>
    </div>
</body>
<script src="./public/js/toast.js"></script>
<script>
<?php
    $statusAction = isset($_GET['status']) ? $_GET['status'] : "";
    if($statusAction == "success") {
        $message = isset($_GET['message']) ? $_GET['message'] : "Thực hiện thành công";
?>
showSuccess("<?=$message?>");
<?php
    } else if($statusAction == "fail") {
        $message = isset($_GET['message']) ? $_GET['message'] : "Thực hiện tất bại. Thử lại.";
?>
showError("<?=$message?>");
<?php
    }
?>
</script>
<script src="./public/js/Ajax/filter.js"></script>
<script src="./public/js/Ajax/toggleStatus.js"></script>
<script src="./public/js/Ajax/togglePriority.js"></script>
<script src="./public/js/main.js"></script>
<script>
    var allDel = document.querySelectorAll('.delete');
    [...allDel].forEach(function(item) {
        item.addEventListener('click', function(e) {
            if(confirm("Are you sure to delete?") == false) {
                e.preventDefault();
            }
        })
    })

    // delete by check
    function deleteByCheck(type) {
        if(confirm("Bạn có chắc muốn xóa các mục này?") == true) {
            const allChecked = document.querySelectorAll('.deleteByCheck');
            const listChecked = [];
            allChecked.forEach(function(item) {
                if(item.checked) {
                    listChecked.push(item.value);
                }
            });
            $.ajax({
                url: "./view/delete/deleteByCheck.php",
                type: 'POST',
                dataType: 'html',
                data: {
                    'data[]': listChecked,
                    'isAll': false,
                    'type': type
                }
            }).done(function(data) {
                window.location.reload();
            })
        }
    }
    function deleteAll(type) {
        if(confirm("Bạn có muốn xóa tất cả mục này?") == true) {
            $.ajax({
                url: "./view/delete/deleteByCheck.php",
                type: 'POST',
                dataType: 'html',
                data: {
                    'data[]': [],
                    'isAll': true,
                    'type': type
                }
            }).done(function(data) {
                window.location.reload();
            })
        }
    }
</script>
</html>