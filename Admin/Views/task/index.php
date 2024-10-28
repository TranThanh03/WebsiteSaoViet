<div class="task">
    <h2 id="title">Danh sách phân công</h2>
        <div class="control">
            <button>Thêm</button>
            <div>
                <input type="search"><button>Tìm</button>
            </div>
        </div>
    <div class="main">
        <table>
            <thead>
                <th>STT</th>
                <th>Mã phân công</th>
                <th>Mã tour</th>
                <th>Tour</th>
                <th>Mã hướng dẫn viên</th>
                <th>Hướng dẫn viên</th>
                <th>Ảnh</th>
                <th>Ngày khởi hành</th>
                <th>Ngày kết thúc</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php 
                    $stt=1;
                    foreach($tasks as $value):?>
                    <tr>
                        <td><?=$stt++?></td>
                        <td><?=$value->MaPC?></td>
                        <td><?=$value->MaTour?></td>
                        <td><?=$value->TenTour?></td>
                        <td><?=$value->MaHDV?></td>
                        <td><?=$value->TenHDV?></td>
                        <td><img src="./public/img/guide/<?=$value->AnhHDV?>"></td>
                        <td><?=date('d-m-Y', strtotime($value->NgayKH))?></td>
                        <td><?=date('d-m-Y', strtotime($value->NgayKT))?></td>
                        <td><a href="index.php?controller=task&action=delete&id=<?=$value->MaPC?>"><button>Xóa</button></a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php
    if (isset($_GET['code'])) {
        $status = $_GET['code'];

        echo "<div class='alert alert-{$status}'>{$status}</div>";
    }
?>