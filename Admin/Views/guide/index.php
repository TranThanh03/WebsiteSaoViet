<div class="guide">   
    <h2 id="title">Danh sách hướng dẫn viên</h2>
        <div class="control">
            <a href="index.php?controller=guide&action=create"><button>Thêm</button></a>
            <div>
                <form action="index.php?controller=guide&action=search" method="post">
                    <input type="search" name="input-search" placeholder="Nhập mã, tên, sdt hướng dẫn viên" autocomplete="off" required>
                    <button type="submit" name="btn-search">Tìm</button>
                </form>
            </div>
        </div>
    <div class="main">
        <table>
            <thead>
                <th>STT</th>
                <th>Mã HDV</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php
                    $stt = 1; 
                    foreach($guides as $value):?>
                    <tr>
                        <td><?=$stt++?></td>
                        <td><?=$value->MaHDV?></td>
                        <td><?=$value->TenHDV?></td>
                        <td><?=date('d-m-Y', strtotime($value->NgaySinh))?></td>
                        <td><?=$value->GioiTinh?></td>
                        <td><?=$value->SDT?></td>
                        <td class="avatar">
                            <img src="../Admin/public/img/guide/<?=isset($value->AnhHDV) && $value->AnhHDV != '' ? $value->AnhHDV : 'no-image.png'?>" alt="anh hdv">
                        </td>
                        <td>
                            <a href="index.php?controller=guide&action=showForm&id=<?=$value->MaHDV?>"><button>Sửa</button></a>
                            <a href="index.php?controller=guide&action=delete&id=<?=$value->MaHDV?>"><button style="color: red;">Xóa</button></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>