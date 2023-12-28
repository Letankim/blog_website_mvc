<?php
    function showListPage($type, $currentPage, $pages) {
        echo ' <div class="box__device_page">
        <span class="current__page">Current page: '.$currentPage.'/'.$pages.' pages</span>
        <ul class="list__page_number">';
        for($i=1; $i <= $pages; $i++) {
            echo '<li class="item__page_number">
                <a href="?act='.$type.'&page='.$i.'" class="item__link-page-number">'.$i.'</a>
            </li>';
        }
        echo '</ul>
        </div>';
    }
?>