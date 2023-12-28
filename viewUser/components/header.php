<?php
    function showHeadDocument() {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <base href="http://localhost/myblogMVC/">
            <link rel="icon" type="image/png" href="./uploads/Logo.png">
            <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
            <link rel="stylesheet" href="./public/assets/css/css_bootstrap/bootstrap.min.css">
            <link rel="stylesheet" href="./public/assets/css/css_bootstrap/bootstrap.css">
            <link rel="stylesheet" href="./public/assets/css/base.css">
            <link rel="stylesheet" href="./public/assets/css/style.css">
            <link rel="stylesheet" href="./public/assets/css/form.css">
            <link rel="stylesheet" href="./public/assets/css/responsive.css">';
    }

    function showHeaderNavigation() {
        $result = "<header>
        <div class='container-header'>
            <a href = '.' class='logo'>
                <img src='./uploads/Logo.png' alt='Logo'>
            </a>
            <div class='box-menu-in-mobile hide-on-laptop hide-on-tablet'>
                <i class='bx bx-menu'></i>
            </div>
            <nav class='navigation'>
                <ul class='list-nav'>
                    <li class='item-nav'>
                        <a href='.' class='item-nav-link'>Trang chủ</a>
                    </li>
                    <li class='item-nav'>
                        <a href='./post.html' class='item-nav-link'>Bài viết</a>
                    </li>
                    <li class='item-nav'>
                        <a href='./about.html' class='item-nav-link'>Chúng tôi</a>
                    </li>
                    <li class='item-nav'>
                        <a href='./product.html' class='item-nav-link'>Theme</a>
                    </li>";
                    if(!isset($_SESSION['userId'])) {
                        $result.='<li class="item-nav">
                            <a href="dang-nhap.html" class="item-nav-link">Đăng nhập</a>
                        </li>';
                    }
                    if(isset($_SESSION['roleUser']) && $_SESSION['roleUser'] == 0 && isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        $result.='<li class="item-nav">
                                <a href="./personal.html" class="item-nav-link">'.$username.'</a>
                            </li>
                            <li class="item_nav">
                                <a href="?act=logout" class="item-nav-link">Đăng xuất</a>
                            </li>';
                    }
                    $result.='</ul>
                    </nav>
                </div>
            </header>
            
            ';
        return $result;   
    }
?>
