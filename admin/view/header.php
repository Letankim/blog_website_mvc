<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../uploads/logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/toast.css">
    <link rel="stylesheet" href="./public/css/form.css">
    <link rel="stylesheet" href="./public/css/responsive.css">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <script src="./public/js/validator.js"></script>
    <title>Trang chủ</title>
</head>
<body>
    <script>
            $(document).ready(function () {
                $("#table-data").DataTable();
            });
    </script>
    <div class="container">
        <div id="toast">

        </div>
        <div class="header">
            <h2 class="name_app">My admin blog</h2>
            <img src="../uploads/logo.png" alt="" class="header_logo">
            <div class="box_menu hide_on_laptop">
                <i class='bx bx-menu' ></i>
            </div>
        </div>
        <div class="box_show_menu hide_on_laptop">
            <div class="overlay"></div>
        </div>
        <div class="wrapper_app">
            <div class="navigation">
                <div class="header_nav">
                    <div class="box_info_admin">
                        <img src="../uploads/<?=$_SESSION['avatarAdmin']?>" alt="Avatar admin">
                        <a href="?act=personal-admin" class="name_user"><?=$_SESSION['usernameAdmin']?></a>
                    </div>
                    <div class="logout">
                        <a href="index.php?act=logout" class="logout_link">
                            <i class='bx bx-power-off' ></i>
                        </a>
                    </div>
                </div>
                <ul class="list_nav">
                    <li class="nav_item">
                        <a href="index.php?act=trangchu" class="nav_item_link">
                            <i class='bx bx-home'></i>
                            Trang chủ
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=navigation" class="nav_item_link">
                            <i class='bx bxs-navigation' ></i>
                            Danh mục
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=banner" class="nav_item_link">
                            <i class='bx bx-slider' ></i>
                            Banner
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=post" class="nav_item_link">
                            <i class='bx bxs-edit' ></i>
                            Bài viết
                        </a>
                    </li>
                    <?php
                        if($_SESSION['roleAdmin'] && $_SESSION['roleAdmin'] == 2) {
                    ?>   
                    <li class="nav_item">
                        <a href="index.php?act=account" class="nav_item_link">
                            <i class='bx bxs-user-account' ></i>
                            Tài khoản
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <li class="nav_item">
                        <a href="index.php?act=about" class="nav_item_link">
                            <i class='bx bxs-color'></i>
                            Giới thiệu
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=slogan" class="nav_item_link">
                            <i class='bx bxl-slack'></i>
                            Slogan
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=advertise" class="nav_item_link">
                            <i class='bx bxs-badge-dollar'></i>
                            Popup
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=product" class="nav_item_link">
                            <i class='bx bxs-badge-dollar'></i>
                            Sản phẩm
                        </a>
                    </li>
                </ul>
            </div>