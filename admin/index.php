<?php
    session_start();
    ob_start();
    if(isset($_SESSION['roleAdmin']) && $_SESSION['roleAdmin'] == 1) {
        $zone_Asia_Ho_Chi_Minh = date_default_timezone_set('Asia/Ho_Chi_Minh');
        include_once "./config/config.php";
        include_once "./config/include.php";
        if(isset($_GET['act']) && $_GET['act']) {
            $type = $_GET['act'];
            switch($_GET['act']) {
                case "navigation":
                    require_once "./controller/NavigationAdminController.php";
                    $navigationController = new NavigationAdminController();
                    if(isset($_POST['add-navigation']) && $_POST['add-navigation']) {
                        $navigationController->adminAddNavigation();
                    } else {
                        $navigationController->adminNavigation();
                    }
                    break;
                case "editNavigationForm":
                    require_once "./controller/NavigationAdminController.php";
                    $navigationController = new NavigationAdminController();
                    $navigationController->adminFormEditNavigation();
                    break;
                case "updateNavigation":
                    require_once "./controller/NavigationAdminController.php";
                    $navigationController = new NavigationAdminController();
                    $navigationController->adminUpdateNavigation();
                    break;
                case "deleteNavigation":
                    require_once "./controller/NavigationAdminController.php";
                    $navigationController = new NavigationAdminController();
                    $navigationController->adminDeleteNavigation();
                    break;
                case "post":
                    require_once "./controller/PostAdminController.php";
                    $postController = new PostAdminController();
                    if(isset($_POST['add-post']) && $_POST['add-post']) {
                        $postController->adminAddPost();
                    } else {
                        $postController->adminPost();
                    }
                    break;
                case "postDetail":
                    require_once "./controller/PostAdminController.php";
                    $postController = new PostAdminController();
                    $postController->adminDetailPost();
                    break;
                case "commentPost":
                    require_once "./controller/PostAdminController.php";
                    $postController = new PostAdminController();
                    $postController->adminCommentPost();
                    break;
                case "banComment":
                    require_once "./controller/PostAdminController.php";
                    $postController = new PostAdminController();
                    $postController->adminBanCommentPost();
                    break;
                case "editPostForm":
                    require_once "./controller/PostAdminController.php";
                    $postController = new PostAdminController();
                    $postController->adminEditFormPost();
                    break;
                case "updatePost":
                    require_once "./controller/PostAdminController.php";
                    $postController = new PostAdminController();
                    $postController->adminUpdatePost();
                    break;
                case "deletePost":
                    require_once "./controller/PostAdminController.php";
                    $postController = new PostAdminController();
                    $postController->adminDeletePost();
                    break;
                case "deleteComment":
                    require_once "./controller/PostAdminController.php";
                    $postController = new PostAdminController();
                    $postController->adminDeleteCommentPost();
                    break;
                case "account":
                    require_once "./controller/UserAdminController.php";
                    $userController = new UserAdminController();
                    if(isset($_POST['add-user']) && $_POST['add-user']) {
                        $userController->adminAddUser();
                    } else {
                        $userController->adminUser();
                    }
                    break; 
                case "editUserForm": 
                    require_once "./controller/UserAdminController.php";
                    $userController = new UserAdminController();
                    $userController->adminEditFormUser();
                    break;
                case "updateUser": 
                    require_once "./controller/UserAdminController.php";
                    $userController = new UserAdminController();
                    $userController->adminUpdateUser();
                    break; 
                case "deleteUser": 
                    require_once "./controller/UserAdminController.php";
                    $userController = new UserAdminController();
                    $userController->adminDeleteUser();
                    break;
                case "banner": 
                    require_once "./controller/BannerAdminController.php";
                    $bannerController = new BannerAdminController();
                    if(isset($_POST["add-banner"])) {
                        $bannerController->adminAddBanner();
                    } else {
                        $bannerController->adminBanner();
                    }
                    break;
                case "editBannerForm":
                    require_once "./controller/BannerAdminController.php";
                    $bannerController = new BannerAdminController();
                    $bannerController->adminFormEditBanner();
                    break;
                case "updateBanner":
                    require_once "./controller/BannerAdminController.php";
                    $bannerController = new BannerAdminController();
                    $bannerController->adminUpdateBanner();
                    break;
                case "deleteBanner":
                    require_once "./controller/BannerAdminController.php";
                    $bannerController = new BannerAdminController();
                    $bannerController->adminDeleteBanner();
                    break;
                case "about": 
                    require_once "./controller/AboutAdminController.php";
                    $aboutController = new AboutAdminController();
                    if(isset($_POST['add-about']) && $_POST['add-about']) {
                        $aboutController->adminAddAbout();
                    } else {
                        $aboutController->adminAbout();
                    }
                    break;
                case "editIntroForm":
                    require_once "./controller/AboutAdminController.php";
                    $aboutController = new AboutAdminController();
                    $aboutController->adminEditFormAbout();
                    break;
                case "updateIntro":
                    require_once "./controller/AboutAdminController.php";
                    $aboutController = new AboutAdminController();
                    $aboutController->adminUpdateAbout();
                    break;
                case "deleteIntro":
                    require_once "./controller/AboutAdminController.php";
                    $aboutController = new AboutAdminController();
                    $aboutController->adminDeleteAbout();
                    break;
                case "slogan":
                    require_once "./controller/SloganAdminController.php";
                    $sloganController = new SloganAdminController();
                    if(isset($_POST['add-slogan']) && $_POST['add-slogan']) {
                        $sloganController->adminAddSlogan();
                    } else {
                        $sloganController->adminSlogan();
                    }
                    break;
                case "editSloganForm":
                    require_once "./controller/SloganAdminController.php";
                    $sloganController = new SloganAdminController();
                    $sloganController->adminEditFormSlogan();
                    break;
                case "updateSlogan":
                    require_once "./controller/SloganAdminController.php";
                    $sloganController = new SloganAdminController();
                    $sloganController->adminUpdateSlogan();
                    break;
                case "deleteSlogan":
                    require_once "./controller/SloganAdminController.php";
                    $sloganController = new SloganAdminController();
                    $sloganController->adminDeleteSlogan();
                    break;
                case "advertise":
                    require_once "./controller/AdvertiseAdminController.php";
                    $advertiseController = new AdvertiseAdminController();
                    if(isset($_POST['add-advertise']) && $_POST['add-advertise']) {
                        $advertiseController->adminAddAdvertise();
                    }
                    else {
                        $advertiseController->adminAdvertise();
                    }
                    break;
                case "editAdverForm":
                    require_once "./controller/AdvertiseAdminController.php";
                    $advertiseController = new AdvertiseAdminController();
                    $advertiseController->adminEditFormAdvertise();
                    break;
                case "updateAdver":
                    require_once "./controller/AdvertiseAdminController.php";
                    $advertiseController = new AdvertiseAdminController();
                    $advertiseController->adminUpdateAdvertise();
                    break;
                case "deleteAdver":
                    require_once "./controller/AdvertiseAdminController.php";
                    $advertiseController = new AdvertiseAdminController();
                    $advertiseController->adminDeleteAdvertise();
                    break;
                case 'product':
                    require_once "./controller/ProductAdminController.php";
                    $productController = new ProductAdminController();
                    if(isset($_POST['add-product']) && $_POST['add-product']) {
                        $productController->adminAddProduct();
                    } else {
                        $productController->adminProduct();
                    }
                    break;
                case 'editProductForm':
                    require_once "./controller/ProductAdminController.php";
                    $productController = new ProductAdminController();
                    $productController->adminEditFormProduct();
                    break;
                case 'updateProduct':
                    require_once "./controller/ProductAdminController.php";
                    $productController = new ProductAdminController();
                    $productController->adminUpdateProduct();
                    break;
                case 'deleteProduct':
                    require_once "./controller/ProductAdminController.php";
                    $productController = new ProductAdminController();
                    $productController->adminDeleteProduct();
                    break;
                case "personal-admin":
                    require_once "./controller/PersonalAdminController.php";
                    $personalAdminController = new PersonalAdminController();
                    if(isset($_POST['update-personal']) && $_POST['update-personal']) {
                        $personalAdminController->adminUpdatePersonal();
                    } else {
                        $personalAdminController->adminPersonal();
                    }
                    break;
                case "logout":
                    unset($_SESSION['roleAdmin']);
                    unset($_SESSION['usernameAdmin']);
                    unset($_SESSION['idAdmin']);
                    header("Location: index.php");
                    break;
                case "trangchu":
                    require_once "./controller/HomeAdminController.php";
                    $homeController = new HomeAdminController();
                    $homeController->home();
                    break;
                default: 
                    require_once "./controller/HomeAdminController.php";
                    $homeController = new HomeAdminController();
                    $homeController->home();
            }
        } else {
            require_once "./controller/HomeAdminController.php";
            $homeController = new HomeAdminController();
            $homeController->home();
        }
        include "./view/footer.php";
    } else {
        header("Location: ../admin/auth/login.php");
    }
?>