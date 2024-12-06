<?php if(isset($_SESSION['username'])):?> 
    <?php if(!empty($calendars)):?> 
        <main>
            <div class="container">
                <h1>Danh sách Tour đã đặt</h1>
                <div class="tour-list">
                    <?php foreach($calendars as $value):?>
                        <div class="tour-item">
                            <a href="index.php?controller=tour&action=detail&id=<?=$value->MaTour?>">
                                <img src="./Admin/public/img/tour/<?=$value->AnhTour ?? 'no-image.png'?>" alt="anh">
                            </a>
                            <div class="tour-info">
                                <h3><?=$value->TenTour?>(<span id="startDate"><?=date('d/m/Y', strtotime($value->NgayKH))?></span> - <span id="endDate"><?=date('d/m/Y', strtotime($value->NgayKT))?></span>)</h3>
                                <p><strong>Mã đơn đặt:</strong> <?=$value->MaDD?></p>
                                <p><strong>Thời gian đặt:</strong> 
                                    <?php 
                                        $datetime = $value->ThoiGianDat;
                                        $date = new DateTime($datetime);
                                        echo $date->format('H:i:s d-m-Y');
                                    ?>
                                </p>
                                <p><strong>Hướng dẫn viên:</strong> 
                                    <a href="index.php?controller=guide&action=detail&id=<?=$value->MaHDV?>"><?=$value->TenHDV?></a>
                                </p>
                                <p><strong>Tổng tiền:</strong> <span style="color: red;"><?=$value->TongTien?>VND</span></p>
                                <p class="status" <?= $value->TrangThai == "Đã xác nhận" ? 'id="confirm-status"' : ($value->TrangThai == "Đã hủy" ? 'id="cancel-status"' : '') ?>><strong>Trạng thái:</strong> <?=$value->TrangThai?></p>
                                
                                <?php if($value->TrangThai === 'Đang xử lý'):?>
                                    <button type="button" id="btn-cancel" onclick="actionCancel(<?=$value->MaDD?>)">Hủy Tour</button>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </main>
    <?php else:?>
        <main style="height: 500px; padding: 10px 20px;">
            <h2>Chưa có tour nào được đặt. Hãy tìm hiểu các lựa chọn du lịch tuyệt vời cùng Sao Việt!</h2>
        </main>
    <?php endif;?>  
<?php else:?>
    <main style="height: 500px; padding: 10px 20px;">
        <h2>Không có dữ liệu!</h2>
    </main>
<?php endif;?> 

<div class="notifi">
    <div class="title">
        <input type="hidden" id="code" value="<?=isset($_REQUEST['code']) ? $_REQUEST['code'] : ''?>">
        <p><?=isset($message) ? $message : ''?></p>
    </div>
    <div class="content">
        <p id="countdown"></p>
    </div>
</div>

<script>
    function actionCancel(idCalendar) {
        Swal.fire({
            title: 'Xác nhận',
            html: `Bạn có chắc chắn hủy đơn <b>${idCalendar}</b> không?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `index.php?controller=calendar&action=cancel&id=${idCalendar}`;
            }
        });
    }
</script>