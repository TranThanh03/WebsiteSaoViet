<div class="task">
    <h2 id="title">Danh sách phân công</h2>
        <div class="control">
            <button id="btn-open">Thêm</button></a>
            <div>
                <input type="search"><button>Tìm</button>
            </div>
        </div>
    <div class="main">
        <table>
            <thead>
                <th>STT</th>
                <th>Mã phân công</th>
                <th>Mã tour</th>
                <th>Tour</th>
                <th>Mã hướng dẫn viên</th>
                <th>Hướng dẫn viên</th>
                <th>Ngày khởi hành</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php 
                    $stt=1;
                    foreach($tasks as $value):?>
                    <tr>
                        <td><?=$stt++?></td>
                        <td><?=$value->MaPC?></td>
                        <td><?=$value->MaTour?></td>
                        <td><?=$value->TenTour?></td>
                        <td><?=$value->MaHDV?></td>
                        <td><?=$value->TenHDV?></td>
                        <td><?=date('d-m-Y', strtotime($value->NgayKH))?></td>
                        <td><?=date('d-m-Y', strtotime($value->NgayKT))?></td>
                        <td><?=$value->TrangThai?></td>
                        <td><a href="index.php?controller=task&action=delete&id=<?=$value->MaPC?>"><button>Xóa</button></a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<div class="form-input" id="form-insert">
        <div class="content">
            <h2>Thêm lịch phân công</h2>
            <button id="btn-close">X</button>
            <form action="index.php?controller=task&action=insert" method="post">
                <label for="select-item">Mã - Tên tour</label>
                <select class="select-item" name="MaTour">
                    <option value="0"></option>
                    <?php foreach($tours as $tour):?>
                        <option value="<?=$tour->MaTour?>" <?=isset($_REQUEST['idTour']) && $tour->MaTour == $_REQUEST['idTour'] ? 'selected' : ''?>><?=$tour->MaTour?> - <?=$tour->TenTour?></option>;
                    <?php endforeach;?>
                </select>
                <label for="select-item">Mã - Tên hướng dẫn viên</label>
                <select class="select-item" name="MaHDV">
                    <option value="0"></option>
                    <?php foreach($guides as $guide):?>
                        <option value="<?=$guide->MaHDV?>" <?=isset($_REQUEST['idGuide']) && $guide->MaHDV == $_REQUEST['idGuide'] ? 'selected' : ''?>><?=$guide->MaHDV?> - <?=$guide->TenHDV?></option>;
                    <?php endforeach;?>
                </select>
                <label for="date">Ngày khởi hành:</label>
                <input type="date" name="NgayKH" value="<?=isset($_REQUEST['startDate']) ? date('Y-m-d', strtotime($_REQUEST['startDate'])) : date('Y-m-d')?>"/>
                <label for="date">Ngày kết thúc:</label>
                <input type="date" name="NgayKT" value="<?=isset($_REQUEST['endDate']) ? date('Y-m-d', strtotime($_REQUEST['endDate'])) : date('Y-m-d')?>"/>
        
                <button type="submit" name="btn-submit" id="btn-submit">Thêm</button>
            </form>
        </div>
    </div>
</div>