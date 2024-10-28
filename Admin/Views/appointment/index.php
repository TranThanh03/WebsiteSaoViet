<div class="appointment"></div>    
    <h2 id="title">Danh sách lịch đặt</h2>
    <div class="control">
        <div>
            <input type="search"><button>Tìm</button>
        </div>
    </div>
    <div class="main">
        <table>
            <thead>
                <th>STT</th>
                <th>Mã lịch đặt</th>
                <th>Mã khách hàng</th>
                <th>Tên Khách hàng</th>
                <th>Tên tour</th>
                <th>Tổng tiền</th>
                <th>Thời gian đặt</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php
                    $stt = 1; 
                    foreach($calendars as $value):?>
                        <tr>
                            <td><?=$stt++?></td>
                            <td><?=$value->MaLD?></td>
                            <td><?=$value->MaKH?></td>
                            <td><?=$value->TenKH?></td>
                            <td><?=$value->TenTour?></td>
                            <td><?=$value->TongTien?></td>
                            <td><?=date('H:i:s d/m/Y', strtotime($value->ThoiGianDat))?></td>
                            <td><?=$value->TrangThai?></td>
                            <td>
                                <a href="index.php?controller=appointment&action=detail&id=<?=$value->MaLD?>"><button type="button">Chi tiết</button></a>
                            </td> 
                        </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>