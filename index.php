<?php
    session_start();
    ob_start();
    $TYPE_USER = 0;
    require_once "./config/config.php";
    require_once "./config/include.php";
    if((isset($_GET['act']) && $_GET['act'] != 'login' && $_GET['act'] != 'signup' && $_GET['act'] != 'forget-password') || (!isset($_GET['act']))) {
        showHeadDocument();
    } 
    if(isset($_GET['act']) && $_GET['act']) {
        switch($_GET['act']) {
            case "trangchu":
                include "./controller/HomeController.php";
                $homeController = new HomeController();
                $homeController->home();
                if(isset($_POST["send-message"])) {
                    $homeController->sendContact();
                } else {
                    $homeController->home();
                }
                break;
            case "post":
                include "./controller/PostController.php";
                $postController = new PostController();
                $postController->post();
                break;
            case "danhmuc":
                include "./controller/NavigationController.php";
                $navigationController = new NavigationController();
                $navigationController->showPostNavigation();
                break;
            case "loc":
                include "./controller/FilterController.php";
                $filterController = new FilterController();
                $filterController->filter();
                break;
            case "blogItem":
                include "./controller/DetailPostController.php";
                $detailPostController = new DetailPostController();
                $detailPostController->detailPost();
                break;
            case "search":
                include "./controller/SearchController.php";
                $searchController = new SearchController();
                $searchController->search();
                break;
            case "personal":
                include "./controller/PersonalController.php";
                $personalController = new PersonalController();
                $personalController->personal();
                break;
            case "updateInformationPersonal":
                include "./controller/PersonalController.php";
                $personalController = new PersonalController();
                $personalController->updatePersonal();
                break;
            case "about":
                include "./controller/AboutController.php";
                $aboutController = new AboutController();
                $aboutController->about();
                break;
            case "product":
                include "./controller/ProductController.php";
                $productController = new ProductController();
                $productController->product();
                break;
            case "response":
                include_once "./viewUser/components/responseLetter.php";
                break;
            case "login":
                include "./controller/AuthController.php";
                $authController= new AuthController();
                $authController->login();
                break;
            case "404":
                include "./controller/ErrorController.php";
                $notFountController= new ErrorController();
                $notFountController->notFound();
                break;
            case "logout":
                if(isset($_SESSION['userId'])  && isset($_SESSION['username'])) {
                    unset($_SESSION['roleUser']);
                    unset($_SESSION['username']);
                    unset($_SESSION['userId']);
                }
                header("Location: trangchu.html");
                break;
            case "signup":
                include "./controller/AuthController.php";
                $authController= new AuthController();
                $authController->signup();
                break;
            case "forget-password":
                include "./controller/AuthController.php";
                $authController= new AuthController();
                $authController->forgetPassword();
                break;
            default:
                header("Location: ./404.html");
                break;
        }
    } else {
        include "./controller/HomeController.php";
        $home = new HomeController();
        $home->home();
    }
?>