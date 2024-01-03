<?php
    $userDao = new UserDao();
    $title = $currentPost->getTitle();
?>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Bình luận</h2>
    </div>
    <div class="container_main">
        <div class="show_list">
            <header>Bình luận của <?=$title?></header>
            <!-- filter -->
            <div class="wrapper-post-detail">
            <table id="table-data">
                <thead>
                    <th>STT</th>
                    <th>User</th>
                    <th>Bình luận</th>
                    <th>Ngày</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($allComment as $comment) {
                        $id = $comment->getId();
                        $idUser = $comment->getIdUser();
                        $commentContent = $comment->getComment();
                        $date = $comment->getTime_comment();
                        $status = $comment->getStatus();
                        $statusText = $status == 1 ? "Bình  thường" : "Đang cấm";
                        $statusColor = "";
                        $action = "?act=banComment&id=".$id;
                        $banText = "";
                        if($status == 0) {
                            $statusText = "Mới";
                            $statusColor = "background: #34d01d;";
                            $action.="&type=allow";
                            $banText = "Duyệt";
                        } else if($status == 1) {
                            $statusText = "Bình  thường";
                            $action.="&type=ban";
                            $banText = "Cấm";
                        } else {
                            $statusColor = "background: #da4910;";
                            $statusText = "Đang cấm";
                            $action.="&type=allow";
                            $banText = "Mở cấm";
                        }
                        $nameUser = $userDao->getOneUser($idUser)->getUsername();
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td>
                                <a href="?act=editUserForm&id=<?=$idUser?>"><?=$nameUser?></a>
                            </td>
                            <td><?=$commentContent?></td>
                            <td><?=$date?></td>
                            <td>
                            <button style="<?=$statusColor?>" class = "btn_change-status"><?=$statusText?></button>
                            </td>
                            <td class="action">
                                <a href="?act=deleteComment&id=<?=$id?>" class = "delete" title="Xoá">
                                    <i class="bx bx-recycle" ></i>
                                </a>
                                <?php
                                    if($status == 0) {
                                ?>
                                        <a href="?act=banComment&id=<?=$id?>&type=allow" title="Duyệt">
                                           Duyệt |
                                        </a>
                                        <a href="?act=banComment&id=<?=$id?>&type=ban" title="Cấm">
                                            Cấm
                                        </a>
                                <?php
                                    } else {
                                ?>
                                        <a href="<?=$action?>" title="<?=$banText?>">
                                            <?=$banText?>
                                        </a>
                                <?php
                                    }
                                ?>   
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/languages/go.min.js"></script>
<script>
    var codeBlocks = document.querySelectorAll('pre code');
    for (var i = 0; i < codeBlocks.length; i++) {
        hljs.highlightBlock(codeBlocks[i]);
    }
</script>
