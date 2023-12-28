<?php
    function formFilterByStatus() {
        echo '<div class="filter">
                <select name="fill" id="fill" onchange="filterByStatus(this)">
                    <option value="-1">Trạng thái</option>
                    <option value="0">Đang ẩn</option>
                    <option value="1">Hoạt động</option>
                </select>
            </div>';
    }
    function formFilterByDate($date) {
        $htmlResult = "";
        $htmlResult.='<div class="filter">
        
                <select name="fill" id="fill" onchange="filterByDate(this)">
                <option value="-1">Lọc theo ngày</option>
                ';
                foreach ($date as $item) {
                    $htmlResult.='<option value="'.$item['date'].'">'.$item['date'].'</option>';
                }
                $htmlResult.='</select>
        </div>';
        return $htmlResult;
    }
    // 
    // <option value="1">Hoạt động</option>
    function formFilterPostByNavigation($allNav) {
        echo '<div class="filter">
                <select name="fill" id="fill" onchange="filterPostByNavigation(this)">
                    <option value="-1">Navigation</option>';
                foreach($allNav as $itemNav) {
                    echo '<option value="'.$itemNav->getId().'">'.$itemNav->getName().'</option>';
                }
            echo '</select>
        </div>';
    }
?>