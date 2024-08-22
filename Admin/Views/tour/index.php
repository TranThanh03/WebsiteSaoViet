<!-- Start docter-->
<div class="user">
    <button class="service-Insert__btn"><a href="index.php?controller=tour&action=create">Thêm Tour</a></button>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã tour</th>
                <th>Tour</th>
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
                <td><?php echo $value['MaTour']?></td>
                <td><?php echo $value['TenTour']?></td>
                <td class="avatar">
                    <img src="../Admin/public/img/tour/<?php echo $value['AnhTour']?>" alt="ảnh tour">
                </td>
                <td>
                    <a href="index.php?controller=tour&action=showForm&id=<?php echo $value['MaTour']?>"><button type="button">Sửa</button></a>
                    <a href="index.php?controller=tour&action=delete&id=<?php echo $value['MaTour']?>"><button type="button" style="color: red;">Xóa</button></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<!-- End docter -->
</div>
</div>
