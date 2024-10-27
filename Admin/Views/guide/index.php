<div class="user">
    <button ><a href="index.php?controller=guide&action=create">Thêm hướng dẫn viên</a></button>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã HDV</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;?>
            <?php foreach($guides as $value):?>
                <?php $i++;?>
            <tr>
                <td><?=$i;?></td>
                <td><?=$value->MaHDV?></td>
                <td><?=$value->TenHDV?></td>
                <td><?=date('d-m-Y', strtotime($value->NgaySinh))?></td>
                <td><?=$value->GioiTinh?></td>
                <td><?=$value->SDT?></td>
                <td class="avatar">
                    <img src="../Admin/public/img/guide/<?=$value->AnhHDV?>" alt="anh hdv">
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
