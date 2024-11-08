<div class="tour">
    <h2 id="title">Danh sách tour</h2>
        <div class="control">
            <a href="index.php?controller=tour&action=create"><button>Thêm</button></a>
            <div>
                <form action="index.php?controller=tour&action=search" method="post">
                    <input type="search" name="input-search" placeholder="Nhập mã, tên tour" autocomplete="off" required>
                    <button type="submit" name="btn-search">Tìm</button>
                </form>
            </div>
        </div>
    <div class="main">
        <table>
            <thead>
                <th>STT</th>
                <th>Mã tour</th>
                <th>Tour</th>
                <th>Hình ảnh</th>
                <th>Chủ đề</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php 
                    $stt = 1;
                    foreach($tours as $value):?>
                    <tr>
                        <td><?=$stt++?></td>
                        <td><?=$value->MaTour?></td>
                        <td><?=$value->TenTour?></td>
                        <td class="avatar">
                            <img src="../Admin/public/img/tour/<?=isset($value->AnhTour) && $value->AnhTour != '' ? $value->AnhTour : 'no-image.png'?>" alt="ảnh tour">
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
</div>