<?php
    function showSlogan($slogan) {
        echo '<table id="table-data">
                <thead>
                    <th>Chọn</th>
                    <th>STT</th>
                    <th>Top slogan</th>
                    <th>Bottom slogan</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>';
                    if(count($slogan) > 0) {
                        $i = 1;
                        foreach($slogan as $itemSlogan) {
                            $id = $itemSlogan->getId();
                            $topSlogan = $itemSlogan->getTopslogan();
                            $bottomSlogan = $itemSlogan->getBottomslogan();
                            $status = $itemSlogan->getStatus();
                            $date = $itemSlogan->getDate();
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
                                    <td>'.$topSlogan.'</td>
                                    <td>'.$bottomSlogan.'</td>
                                    <td>'.$date.'</td>
                                    <td>
                                        <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$id.', '.$status.', 6)">'.$statusText.'</button>
                                    </td>
                                    <td class = "action">
                                        <a href="index.php?act=editSloganForm&id='.$id.'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteSlogan&id='.$id.'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    }
            echo '</tbody></table>';
    }
?>