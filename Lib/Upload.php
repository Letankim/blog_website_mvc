<?php
class Upload {
    public function uploadImage($path, $imgPath) {
        $target_dir = $path;
        if($imgPath['name'] != "") {
            $target_file = $target_dir . basename($imgPath['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadOk = 0;
                return "";
            }
            if($uploadOk == 1) {
                move_uploaded_file($imgPath["tmp_name"], $target_file);
                $img = basename($imgPath['name']);
                return $img;
            }
        }
        return "";
    }
}
?>