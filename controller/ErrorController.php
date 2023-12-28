<?php
class ErrorController {
    public function notFound() {
        include_once APP_ROOT."/view/NotFoundView.php";
    }
}
?>