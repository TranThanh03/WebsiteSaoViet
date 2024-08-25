<div class="user">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã lịch đặt</th>
                <th>Mã khách hàng</th>
                <th>Tên Khách hàng</th>
                <th>Tên tour</th>
                <th>Tổng tiền</th>
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
                    <td><?php echo $value['MaLD']?></td>
                    <td><?php echo $value['MaKH']?></td>
                    <td><?php echo $value['TenKH']?></td>
                    <td><?php echo $value['TenTour']?></td>
                    <td><?php echo $value['TongTien']?></td>
                    <td><?php echo $value['ThoiGian']?></td>
                    <td><?php echo $value['TrangThai']?></td>
                    <td>
                        <a href="index.php?controller=appointment&action=detail&id=<?php echo $value['MaLD']?>"><button type="button">Chi tiết</button></a>
                    </td> 
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>