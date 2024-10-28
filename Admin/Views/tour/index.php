<div class="tour">
    <h2 id="title">Danh sách tour</h2>
        <div class="control">
            <button>Thêm</button>
            <div>
                <input type="search"><button>Tìm</button>
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
</div>