<?php
    function showNavigation($allNav) {
        echo '<table id="table-data">
                <thead>
                    <th>Chọn</th>
                    <th>STT</th>
                    <th>Navigation</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>';
                    if(count($allNav) > 0) {
                        $i = 1;
                        foreach($allNav as $itemNav) {
                            $id = $itemNav->getId();
                            $name = $itemNav->getName();
                            $date = $itemNav->getDate();
                            $status = "Ẩn";
                            $styleStatus= "background: #616262";
                            if($itemNav->getStatus() == 1) {
                                $status = "Hoạt động";
                                $styleStatus = "";
                            } 
                            echo '<tr>
                                    <td class = "stt">
                                        <input type="checkbox" value="'.$id.'" class = "deleteByCheck"/>
                                    </td>
                                    <td class = "stt">'.$i++.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$date.'</td>
                                    <td>
                                        <button style="'.$styleStatus.'" class = "btn_change-status"
                                         onClick="handleToggleStatus('.$id.', '.$itemNav->getStatus().', 1)">'.$status.'</button>
                                    </td>
                                    <td class = "action">
                                        <a href="index.php?act=editNavigationForm&id='.$id.'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteNavigation&id='.$id.'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    }
            echo '</tbody></table>';
    }
?>