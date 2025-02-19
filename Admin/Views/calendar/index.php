<style>
    .control {
        justify-content: right;
        padding-right: 50px;
    }

    .control #search {
        width: 440px;
    }

    .main .confirm {
        color: green;
        font-weight: bold;
    }

    .main .cancel {
        color: red;
        font-weight: bold;
    }
</style>

<div class="calendar">
    <h2 id="title">Danh sách đơn đặt</h2>
    <div class="control">
        <div>
            <form action="index.php?controller=calendar&action=search" method="post">
                <input id="search" type="search" name="input-search" placeholder="Nhập mã đơn đặt, mã khách hàng, mã tour, mã hướng dẫn viên" autocomplete="off" required>
                <button type="submit" name="btn-search">Tìm</button>
            </form>
        </div>
    </div>
    <div class="main">
        <table>
            <thead>
                <th>STT</th>
                <th>Mã đơn đặt</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Mã tour</th>
                <th>Mã HDV</th>
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
                            <td><?=$value->MaDD?></td>
                            <td><?=$value->MaKH?></td>
                            <td><?=$value->TenKH?></td>
                            <td><?=$value->MaTour?></td>
                            <td><?=$value->MaHDV?></td>
                            <td><?=$value->TongTien?></td>
                            <td><?=date('H:i:s d/m/Y', strtotime($value->ThoiGianDat))?></td>
                            <td <?= $value->TrangThai == "Đã xác nhận" ? 'class="confirm"' : ($value->TrangThai == "Đã hủy" ? 'class="cancel"' : '') ?>>
                                <?= $value->TrangThai ?>
                            </td>
                            <td>
                                <a href="index.php?controller=calendar&action=detail&id=<?=$value->MaDD?>"><button type="button">Chi tiết</button></a>
                            </td> 
                        </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>