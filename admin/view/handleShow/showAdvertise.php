<?php
    function showAdvertise($advertise) {
        echo '<table id="table-data">
                <thead>
                    <th>STT</th>
                    <th>Chọn</th>
                    <th>Hình ảnh</th>
                    <th>Tên chương trình</th>
                    <th>Link chương trình</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>';
                    if(count($advertise) > 0) {
                        $i = 1;
                        foreach($advertise as $itemAdvertise) {
                            $id = $itemAdvertise->getId();
                            $link = $itemAdvertise->getLink();
                            $name = $itemAdvertise->getName_program();
                            $img = $itemAdvertise->getImg();
                            $status = $itemAdvertise->getStatus();
                            $date = $itemAdvertise->getDate();
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
                                    <td><img width="120px" src="../uploads/'.$img.'"></td>
                                    <td>'.$name.'</td>
                                    <td><a style="font-size: 15px; color: blue;" href = "'.$link.'">Link here</a></td>
                                    <td>'.$date.'</td>
                                    <td>
                                        <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$id.', '.$status.', 7)">'.$statusText.'</button>
                                    </td>
                                    <td class = "action">
                                        <a href="index.php?act=editAdverForm&id='.$id.'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteAdver&id='.$id.'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    }
            echo '</tbody></table>';
    }
?>