<div class="user">
    <button ><a href="index.php?controller=guide&action=create">Thêm hướng dẫn viên</a></button>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Mã tour</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;?>
            <?php foreach($data as $value):?>
                <?php $i++;?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['TenHDV']?></td>
                <td><?php echo $value['NgaySinh']?></td>
                <td><?php echo $value['GioiTinh']?></td>
                <td><?php echo $value['SDT']?></td>
                <td><?php echo $value['Email']?></td>
                <td><?php echo $value['MaTour']?></td>
                <td class="avatar">
                    <img src="../Admin/public/img/guide/<?php echo $value['AnhHDV']?>" alt="anh hdv">
                </td>
                <td>
                    <a href="index.php?controller=guide&action=showForm&id=<?php echo $value['MaHDV']?>"><button>Sửa</button></a>
                    <a href="index.php?controller=guide&action=delete&id=<?php echo $value['MaHDV']?>"><button style="color: red;">Xóa</button></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
