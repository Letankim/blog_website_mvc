<?php
require_once PATH_ROOT_ADMIN."/DAO/NavigationDao.php";
require_once PATH_ROOT."/model/Navigation.php";
class NavigationAdminController {
    public function adminNavigation() {
        $navigationDao = new NavigationDao();
        $allNav = $navigationDao->getAllNav();
        include_once PATH_ROOT_ADMIN."/view/navigationView.php";
    }

    public function adminAddNavigation() {
        $navigationDao = new NavigationDao();
        $navigation = $_POST['navigation'];
        $status = $_POST['status'];
        $date= date('Y/m/d H:i:s');
        $navigation = new Navigation(null, $navigation, $status, $date);
        $isDone = $navigationDao->addNavigation($navigation);
        $type = "fail";
        if($isDone == 1) {
            $type = "success";
        }
        header("Location: ?act=navigation&status=".$type);
    }

    public function adminFormEditNavigation() {
        $navigationDao = new NavigationDao();
        if(isset($_GET['id']) && $_GET['id']) {
            $id = $_GET['id'];
            $currentNav = $navigationDao->getOneNav($id);
            if($currentNav != null) {
                $allNav = $navigationDao->getAllNav();
                include_once PATH_ROOT_ADMIN."/view/editForm/editNavigationForm.php";
            } else {
                header("Location: ?act=404");
            }
        }
    }

    public function adminUpdateNavigation() {
        $navigationDao = new NavigationDao();
        if(isset($_POST['update-navigation']) && $_POST['update-navigation']) {
            $id = $_POST['id'];
            $navigation = $_POST['navigation'];
            $status = $_POST['status'];
            $navigation = new Navigation($id, $navigation, $status, null);
            $isDone = $navigationDao->updateNavigation($navigation);
            $type = "fail";
            if($isDone == 1) {
                $type = "success";
            }
            $allNav = $navigationDao->getAllNav();
            header("Location: ?act=navigation&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }

    public function adminDeleteNavigation() {
        $navigationDao = new NavigationDao();
        if(isset($_GET['id']) && $_GET['id']) {
            $id = $_GET['id'];
            $isDone = $navigationDao->deleteNav($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            $allNav = $navigationDao->getAllNav();
            header("Location: ?act=navigation&status=".$type);
        } else {
            header("Location: ?act=404");
        }
    }
}

?>