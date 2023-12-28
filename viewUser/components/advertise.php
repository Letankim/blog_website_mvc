<?php
    function addAdvertisement($advertise) {
            echo '<div class="overlay_ad"></div>
                    <div class="box_advertisement">
                        <div class="box_btn_close">
                            <i class="bx bx-x close_ad"></i>
                        </div>
                        <a href="'.$advertise->getLink().'" class="wrapper_advertisement">
                            <img src="./uploads/'.$advertise->getImg().'" alt="'.$advertise->getName_program().'" class="img_ad">
                        </a>
                    </div>';

    }
?>