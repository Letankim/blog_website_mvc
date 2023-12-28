<?php
    function showIntroduction($intro) {
        echo '<table id="table-data">
                <thead>
                    <th>STT</th>
                    <th>Chọn</th>
                    <th>Image</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>';
                    if(count($intro) > 0) {
                        $i = 1;
                        foreach($intro as $itemIntro) {
                            $id = $itemIntro->getId();
                            $img = $itemIntro->getImg();
                            $status = $itemIntro->getStatus();
                            $content = $itemIntro->getContent();
                            $date = $itemIntro->getDate();
                            $statusText = "Đang ẩn";
                            $styleStatus= "background: #616262";
                            if($status == 1) {
                                $statusText = "Hoạt động";
                                $styleStatus = "";
                            } 
                            echo '<tr>
                                    <td class = "stt">
                                        <input type="checkbox" value="'.$id.'" class = "deleteByCheck"/>
                                    </td>
                                    <td class = "stt">'.$i++.'</td>
                                    <td><img width="150px" src="../uploads/'.$img.'"></td>
                                    <td>'.$date.'</td>
                                    <td>
                                        <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$id.', '.$status.', 5)">'.$statusText.'</button>
                                    </td>
                                    <td class = "action">
                                        <a href="index.php?act=editIntroForm&id='.$id.'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteIntro&id='.$id.'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                        <i class="bx bx-show-alt" onclick="clickShowDetails(this)"></i>
                                        <div class="overlay_show_post" onclick="closeShow(this)"></div>
                                        <div class="box_show_details">
                                                <div class="btn_close">
                                                    <i class="bx bx-x" onclick="closeShow(this)"></i>
                                                </div>
                                                <h2 class="title_post">Introduction details</h2>
                                                <img src="../uploads/'.$img.'" alt="" class="img_post">
                                                <div class="post_content">
                                                <p>'.$content.'</p>
                                                </div>
                                                <div class="time_post">
                                                    <span class="time">Post at admin</span>
                                                </div>
                                        </div>
                                    </td>
                                </tr>';
                        }
                    }
            echo '</tbody></table>';
    }
?>