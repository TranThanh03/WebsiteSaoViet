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
                <th>Chủ đề</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;?>
            <?php foreach($tours as $value):?>
                <?php $i++;?>
            <tr>
                <td><?=$i;?></td>
                <td><?=$value->MaTour?></td>
                <td><?=$value->TenTour?></td>
                <td class="avatar">
                    <img src="../Admin/public/img/tour/<?=$value->AnhTour?>" alt="ảnh tour">
                </td>
                <td>
                    <?php 
                        foreach($dataCD as $data) {
                            if($data['id'] == $value->MaCD) {
                                echo $data['name'];
                            }
                        }
                    ?>
                </td>
                <td>
                    <a href="index.php?controller=tour&action=showForm&id=<?=$value->MaTour?>"><button type="button">Sửa</button></a>
                    <a href="index.php?controller=tour&action=delete&id=<?=$value->MaTour?>"><button type="button" style="color: red;">Xóa</button></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<!-- End docter -->
</div>
</div>
