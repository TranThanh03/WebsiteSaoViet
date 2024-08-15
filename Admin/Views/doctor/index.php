<!-- Start doctor-->
<div class="user">
    <button ><a href="index.php?controller=doctor&action=create">Thêm bác sĩ</a></button>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên bác sĩ</th>
                <th>Số điện thoại</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Khoa làm việc</th>
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
                <td><?php echo $value['TenBS']?></td>
                <td><?php echo $value['sdt']?></td>
                <td><?php echo $value['NgaySinh']?></td>
                <td><?php echo $value['GioiTinh']?></td>
                <td><?php echo $value['TenKhoa']?></td>
                <td class="avatar">
                    <img src="../Admin/public/img/doctor/<?php echo $value['anh']?>" alt="ảnh bác sĩ">
                </td>
                <td>
                    <button><a href="index.php?controller=doctor&action=showForm&id=<?php echo $value['MaBS']?>">Chi Tiết</a></button>
                    <button><a href="index.php?controller=doctor&action=delete&id=<?php echo $value['MaBS']?>" style="color: red;">Xóa</a></button>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<!-- End doctor -->
</div>
</div>
