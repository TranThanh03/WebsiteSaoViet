<div class="user">

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Khách hàng</th>
                <th>Khoa khám</th>
                <th>Phòng khám</th>
                <th>Bác sĩ</th>
                <th>Nội dung khám</th>
                <th>Ghi chú</th>
                <th>Thời gian khám</th>
                <th>Thời gian đặt</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;?>
            <?php foreach($data as $value):?>
                <?php $i++;?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['TenKH']?></td>
                <td><?php echo $value['TenKhoa']?></td>
                <td><?php echo $value['TenPhongKham']?></td>
                <td><?php echo $value['TenBS']?></td>
                <td><?php echo $value['NoiDungKham']?></td>
                <td><?php echo $value['GhiChu']?></td>
                <td><?php echo $value['ThoiGianKham']?></td>
                <td><?php echo $value['ThoiGianDat']?></td>
                <td><?php echo $value['TenTrangThai']?></td>
                <td>
                    <?php if($value['id_TrangThai'] === '1'):?>
                        <button><a href="index.php?controller=appointment&action=update&status=confirm&id=<?php echo $value['MaLichKham']?>">Xác nhận</a></button>
                        <button><a href="index.php?controller=appointment&action=update&status=noConfirm&id=<?php echo $value['MaLichKham']?>" style="color: red;">Không Xác nhận</a></button>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>