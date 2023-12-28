<?php
    function showAccount($accounts) {
        echo '<table id="table-data">
                <thead>
                    <th>STT</th>
                    <th class = "hide_on_mobile">Tên người dùng</th>
                    <th>Username</th>
                    <th class = "hide_on_mobile">Email</th>
                    <th>Vai trò</th>
                    <th>Ngày tạo</th>
                    <th>By</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </thead>
                <tbody>';
                    if(count($accounts) > 0) {
                        $i = 1;
                        foreach($accounts as $account) {
                            $id = $account->getId();
                            if(isset($_SESSION['idAdmin']) && $_SESSION['idAdmin'] == $id) {
                                continue;
                            }
                            $name = $account->getName();
                            $username = $account->getUsername();
                            $email = $account->getEmail();
                            $status = $account->getStatus();
                            $role = $account->getRole();
                            $date = $account->getDate();
                            $isGoogle = $account->getIsGoogle() == 1 ? "Google" : "Account";
                            $statusText = "Vô hiệu hóa";
                            $styleStatus= "background: #616262";
                            if($status == 1) {
                                $statusText = "Hoạt động";
                                $styleStatus = "";
                            } 
                            $roleText = "User";
                            $admin = "";
                            if($role == 1) {
                                $roleText = "Admin";
                                $admin = "background-color: #535c68; color: #fff";
                            } 
                            echo '<tr style="'.$admin.'">
                                    <td class = "stt">'.$i++.'</td>
                                    <td class = "hide_on_mobile">'.$name.'</td>
                                    <td>'.$username.'</td>
                                    <td class = "hide_on_mobile">
                                    <a href="mailto:'.$email.'">'.$email.'</a>
                                    </td>
                                    <td>'.$roleText.'</td>
                                    <td>'.$date.'</td>
                                    <td>'.$isGoogle.'</td>
                                    <td>';
                                    if($role != 1) {
                                        echo '<button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$id.', '.$status.', 4)">'.$statusText.'</button>';
                                    } else {
                                        echo '<button style="background: #ff7979;cursor: not-allowed;" class = "btn_change-status">'.$statusText.'</button>';
                                    }    
                                    echo '</td>
                                    <td class = "action">
                                        <a href="index.php?act=editUserForm&id='.$id.'"><i class="bx bx-edit-alt" ></i></a>';
                                    if($role != 1) {
                                        echo '<a href="index.php?act=deleteUser&id='.$id.'" class = "delete"><i class="bx bx-recycle" ></i></a>';
                                    }
                                    echo '</td>
                                </tr>';
                        }
                    }
            echo '</tbody></table>';
    }
?>