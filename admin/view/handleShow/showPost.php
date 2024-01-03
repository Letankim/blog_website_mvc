<?php
    function showPost($allPost) {
        echo '<table id="table-data">
                <thead>
                    <th>Chọn</th>
                    <th>STT</th>
                    <th>Title</th>
                    <th>Danh mục</th>
                    <th>Thêm bởi</th>
                    <th>Cập nhật bởi</th>
                    <th>Lên lịch lúc</th>
                    <th>Ưu tiên</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>';
                    if(count($allPost) > 0) {
                        $navigationDao = new NavigationDao();
                        $userDao = new UserDao();
                        $i = 1;
                        foreach ($allPost as $itemPost) {
                            $id = $itemPost->getId();
                            $title = $itemPost->getTitle();
                            $status = $itemPost->getStatus();
                            $priority = $itemPost->getPriority();
                            $schedule = $itemPost->getSchedule();
                            $nameNav = $navigationDao->getOneNav($itemPost->getId_nav())->getName();
                            $userAdd = $userDao->getOneUser($itemPost->getId_user());
                            $nameUserAdd =$userAdd->getName() != null ? $userAdd->getName() : "User không tồn tại";
                            $userUpdate = $userDao->getOneUser($itemPost->getUpdate_by());
                            $nameUserUpdate = $userUpdate != null ? $userUpdate->getName() : "Chưa cập nhật";
                            $statusText = "Ẩn";
                            $styleStatus= "background: #616262";
                            if($status == 1) {
                                $statusText = "Hoạt động";
                                $styleStatus = "";
                            }
                            $statusPriority = "Bình thường";
                            $stylePriority= "background: #616262";
                            if($priority == 1) {
                                $statusPriority = "Ưu tiên";
                                $stylePriority = "background: #da4910";
                            }
                            $showPost = '<tr>
                                        <td class = "stt">
                                            <input type="checkbox" value="'.$id.'" class = "deleteByCheck"/>
                                        </td>
                                        <td class = "stt">'.$i++.'</td>
                                        <td>'.$title.'</td>
                                        <td>'.$nameNav.'</td>
                                        <td>'.$nameUserAdd.'</td>
                                        <td>'.$nameUserUpdate.'</td>
                                        <td>'.$schedule.'</td>
                                        <td>
                                            <button style="'.$stylePriority.'" class = "btn_change-status" onClick="handleTogglePriority('.$id.', '.$priority.',3)">'.$statusPriority.'</button>
                                        </td>
                                        <td>
                                            <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$id.', '.$status.', 3)">'.$statusText.'</button>
                                        </td>
                                        <td class = "action">
                                            <a href="?act=editPostForm&id='.$id.'"><i class="bx bx-edit-alt" ></i></a>
                                            <a href="?act=deletePost&id='.$id.'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                            <a href="?act=postDetail&id='.$id.'">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="?act=commentPost&id='.$id.'">
                                            <i class="bx bxs-comment"></i>
                                            </a>
                                    </td>
                                </tr>';
                                echo $showPost;
                        }
                    }
            echo '</tbody></table>';
    }
?>