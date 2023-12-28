<?php
    function showIP($devices) {
        echo '
        <table>
                <tr>
                    <th>STT</th>
                    <th>Địa chỉ IP</th>
                    <th>Ngày</th>
                </tr>';
                if(count($devices) > 0) {
                    $i = 1;
                    foreach($devices as $itemDevice) {
                        echo '<tr>
                                <td class = "stt">'.$i++.'</td>
                                <td>'.$itemDevice['ip'].'</td>
                                <td>
                                    '.$itemDevice['date'].'
                                </td>
                            </tr>';
                    }
                } else {
                    echo '<tr>
                            <td colspan="10">Chưa có thiết bị nào truy cập</td>
                        </tr>';
                }
            echo '</table>';
    }
?>