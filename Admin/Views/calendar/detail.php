<main class="booking-form">
    <h2>Thông tin đơn đặt mã <?=$calendar[0]->MaDD?></h2>
        <div class="calendar-info">
            <div class="form-group">
                <label for="datetime">Thời gian đặt:</label>
                <input type="text" id="datetime" name="datetime" value="<?=date('H:i:s d-m-Y', strtotime($calendar[0]->ThoiGianDat))?>" readonly>
            </div>
            <div class="form-group">
                <label for="calendar-status">Trạng thái:</label>
                <input type="text" id="calendar-status" name="calendar-status" value="<?=$calendar[0]->TrangThai?>" readonly>
            </div>
        </div>

        <div class="form-container">
            <section class="tour-info">
                <h2>Thông tin tour</h2>
                <div class="tour-image">
                    <img src="./public/img/tour/<?=$tour[0]->AnhTour ?? 'no-image.png'?>" alt="anh" id="tour-image">
                </div>
                <div class="form-group">
                    <label for="tour-code">Mã tour:</label>
                    <input type="text" id="tour-code" name="tour-code" value="<?=$calendar[0]->MaTour?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tour-name">Tên tour:</label>
                    <input type="text" id="tour-name" name="tour-name" value="<?=$calendar[0]->TenTour?>" readonly>
                </div>
                <div class="form-group">
                    <label for="start-date">Ngày khởi hành:</label>
                    <input type="text" id="start-date" name="start-date" value="<?=date('d-m-Y', strtotime($calendar[0]->NgayKH))?>" readonly>
                </div>
                <div class="form-group">
                    <label for="end-date">Ngày kết thúc:</label>
                    <input type="text" id="end-date" name="end-date" value="<?=date('d-m-Y', strtotime($calendar[0]->NgayKT))?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tour-costs">Giá:</label>
                    <input class= "cost" type="text" id="tour-costs" name="tour-costs" value="<?=$calendar[0]->GiaTour?>VND" readonly>
                </div>
            </section>

            <section class="customer-info">
                <h2>Thông tin người đặt</h2>
                <div class="form-group">
                    <label for="user-code">Mã khách hàng:</label>
                    <input type="text" id="user-code" name="user-code" value="<?=$calendar[0]->MaKH?>" readonly>
                </div>
                <div class="form-group">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" id="fullname" name="fullname" value="<?=$calendar[0]->TenKH?>" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" name="phone" value="<?=$account[0]->SDT ?? 'Không xác định!'?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?=$account[0]->Email ?? 'Không xác định!'?>" readonly>
                </div>
            </section>
        </div>

        <div class="guide-info">
            <h2>Thông tin hướng dẫn viên</h2>
            <div class="guide-image">
                <img src="./public/img/guide/<?=$guide[0]->AnhHDV ?? 'no-image.png'?>" alt="anh" id="guide-image">
            </div>
            <div class="guide-content">
                <div class="form-group">
                    <label for="guide-id">Mã hướng dẫn viên:</label>
                    <input type="text" id="guide-id" name="guide-id" value="<?=$calendar[0]->MaHDV?>" readonly>
                </div>
                <div class="form-group">
                    <label for="guide-name">Hướng dẫn viên:</label>
                    <input type="text" id="guide-name" name="guide-name" value="<?=$calendar[0]->TenHDV?>" readonly>
                </div>
                <div class="form-group">
                    <label for="guide-costs">Giá:</label>
                    <input class= "cost" type="text" id="guide-costs" name="guide-costs" value="<?=$calendar[0]->GiaHDV?>VND" readonly>
                </div>
            </div>
        </div>

        <div class="form-group" id="total-group">
            <label for="total-price">Tổng tiền:</label>
            <input type="text" id="total-price" name="total-price" value="<?=$calendar[0]->TongTien?>VND" readonly>
        </div>

        <div class="form-actions">
            <?php if($calendar[0]->TrangThai === 'Đang xử lý'):?>
                <button class="btn-submit" id="btn-confirm" type="button" onclick="actionConfirm(<?=$_REQUEST['id']?>)">Xác nhận</button>
                <button class="btn-submit" id="btn-noConfirm" type="button" onclick="actionNoConfirm(<?=$_REQUEST['id']?>)">Hủy</button>
            <?php else:?>
                <a href="index.php?controller=calendar&action=index"><button type="button" id="btn-back">Quay về</button></a>
            <?php endif;?>
        </div>
    <br><br>
</main>

<script>
    function actionConfirm(idCalendar) {
        Swal.fire({
            title: 'Xác nhận',
            html: `Bạn có chắc chắn <b style="color: green;">xác nhận</b> đơn đặt <b>${idCalendar}</b> không?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `index.php?controller=calendar&action=update&id=${idCalendar}&status=confirm`;
            }
        });
    }

    function actionNoConfirm(idCalendar) {
        Swal.fire({
            title: 'Xác nhận',
            html: `Bạn có chắc chắn <b style="color: red;">hủy</b> đơn đặt <b>${idCalendar}</b> không?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `index.php?controller=calendar&action=update&id=${idCalendar}&status=noConfirm`;
            }
        });
    }
</script>