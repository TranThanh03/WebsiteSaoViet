<main class="booking-form">
    <h2>Thông tin đơn đặt Tour</h2>
        <div class="form-container">
            <section class="tour-info">
                <h2>Thông tin tour</h2>
                <div class="tour-image">
                    <img src="./public/img/tour/<?php echo $data[0]['AnhTour']?>" alt="anh" id="tour-image">
                </div>
                <div class="form-group">
                    <label for="tour-code">Mã tour:</label>
                    <input type="text" id="tour-code" name="tour-code" value="<?php echo $data[0]['MaTour']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tour-name">Tên tour:</label>
                    <input type="text" id="tour-name" name="tour-name" value="<?php echo $data[0]['TenTour']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="tour-costs">Giá:</label>
                    <input class= "cost" type="text" id="tour-costs" name="tour-costs" value="<?php echo $data[0]['Gia']?>VND" disabled>
                </div>
            </section>

            <section class="customer-info">
                <h2>Thông tin người đặt</h2>
                <div class="form-group">
                    <label for="user-code">Mã khách hàng:</label>
                    <input type="text" id="user-code" name="user-code" value="<?php echo $data[0]['MaKH']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $data[0]['TenKH']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $data[0]['SDT']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo $data[0]['Email']?>" disabled>
                </div>
            </section>
        </div>

        <div class="guide-info">
            <h2>Thông tin hướng dẫn viên</h2>
            <div class="guide-image">
                <img src="./public/img/guide/<?php echo $data[0]['AnhHDV']?>" alt="anh" id="guide-image">
            </div>
            <div class="guide-content">
                <div class="form-group">
                    <label for="guide-name">Tên hướng dẫn viên:</label>
                    <input type="text" id="guide-name" name="guide-name" value="<?php echo $data[0]['TenHDV']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="guide-costs">Giá:</label>
                    <input class= "cost" type="text" id="guide-costs" name="guide-costs" value="<?php echo $data[0]['Gia']?>VND" disabled>
                </div>
            </div>
        </div>

        <div class="form-group" id="total-group">
            <label for="total-price">Tổng tiền:</label>
            <input type="text" id="total-price" name="total-price" value="<?php echo $data[0]['TongTien']?>VND" readonly>
        </div>

        <div class="form-actions">
            <?php if($data[0]['TrangThai'] === 'Đang xử lý'):?>
                <button class="btn-submit"><a href="index.php?controller=appointment&action=update&id=<?php echo $_REQUEST['id']?>&status=confirm">Xác nhận</a></button>
                <button class="btn-submit"><a href="index.php?controller=appointment&action=update&id=<?php echo $_REQUEST['id']?>&status=noConfirm" style="color: red;">Hủy</a></button>
            <?php endif;?>
        </div>
    <br><br>
</main>
