<?php
    function showProduct($product) {
        echo '<table id="table-data">
                <thead>
                    <th>Chọn</th>
                    <th>STT</th>
                    <th>Img</th>
                    <th>Link demo</th>
                    <th>Link code</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>';
                    if(count($product) > 0) {
                        $i = 1;
                        foreach($product as $item) {
                            $id  = $item->getId();
                            $linkDemo = $item->getLink_demo();
                            $linkCode = $item->getLink_code();
                            $img = $item->getImg();
                            $status = $item->getStatus();
                            $date = $item->getDate();
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
                                    <td><iframe width="150px" src="'.$linkDemo.'"></iframe></td>
                                    <td><a target="_blank" href="'.$linkDemo.'">Link</a></td>
                                    <td><a target="_blank" href="'.$linkCode.'">Link</a></td>
                                    <td>'.$date.'</td>
                                    <td>
                                        <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('. $id.', '. $status.', 8)">'.$statusText.'</button>
                                    </td>
                                    <td class = "action">
                                        <a href="index.php?act=editProductForm&id='.$id.'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteProduct&id='.$id.'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    }
            echo '</tbody></table>';
    }
?>