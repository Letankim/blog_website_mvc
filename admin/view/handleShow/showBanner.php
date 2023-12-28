<?php
    function showBanner($banners) {
        echo '<table id="table-data">
                <thead>
                    <th>STT</th>
                    <th>Chọn</th>
                    <th>Banner</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>';
                if(count($banners) > 0) {
                    $i = 1;
                    foreach($banners as $itemBanner) {
                        $id = $itemBanner->getId();
                        $img = $itemBanner->getImg();
                        $date = $itemBanner->getDate();
                        $status = $itemBanner->getStatus();
                        $statusText = "Đang ẩn";
                        $styleStatus = "background: #616262";
                        if($status == 1) {
                            $statusText = "Hoạt động";
                            $styleStatus="";
                        } 
                        echo '<tr>
                                <td class = "stt">
                                    <input type="checkbox" value="'.$id.'" class = "deleteByCheck"/>
                                </td>
                                <td class = "stt">'.$i++.'</td>
                                <td><img width="150px" src="../uploads/'.$img.'"></td>
                                <td>'.$date.'</td>
                                <td>
                                    <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$id.', '.$status.', 2)">'.$statusText.'</button>
                                </td>
                                <td class = "action">
                                    <a href="index.php?act=editBannerForm&id='.$id.'"><i class="bx bx-edit-alt" ></i></a>
                                    <a href="index.php?act=deleteBanner&id='.$id.'" class = "delete" ><i class="bx bx-recycle" ></i></a>
                                </td>
                            </tr>';
                    }
                }
            echo '</tbody></table>';
    }
?>