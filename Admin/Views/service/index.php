<!-- Start docter-->
<div class="user">
    <button class="service-Insert__btn"><a href="index.php?controller=service&action=create">Thêm khoa</a></button>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Khoa</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;?>
            <?php foreach($data as $value):?>
                <?php $i++;?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['TenKhoa']?></td>
                <td class="avatar">
                    <img src="../Admin/public/img/service/<?php echo $value['HinhAnh']?>" alt="ảnh bác sĩ">
                </td>
                <td>
                    <button><a href="index.php?controller=service&action=showForm&id=<?php echo $value['MaKhoa']?>">Chi Tiết</a></button>
                    <button><a href="index.php?controller=service&action=delete&table=khoakham&id=<?php echo $value['MaKhoa']?>" style="color: red;">Xóa</a></button>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<!-- End docter -->
</div>
</div>
