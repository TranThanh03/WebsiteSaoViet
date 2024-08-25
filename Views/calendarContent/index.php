
<main class="booking-form">
    <h1>Đặt Tour</h1>
    
    <form action="#" method="POST" id="booking-form">
        <div class="form-container">
            <section class="tour-info">
                <h2>Thông tin tour</h2>
                <div class="tour-image">
                    <img src="./Admin/public/img/tour/<?php echo $tour[0]['AnhTour']?>" alt="anh" id="tour-image">
                </div>
                <div class="form-group">
                    <label for="tour-code">Mã tour:</label>
                    <input type="text" id="tour-code" name="tour-code" value="<?php echo $tour[0]['MaTour']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="tour-name">Tên tour:</label>
                    <input type="text" id="tour-name" name="tour-name" value="<?php echo $tour[0]['TenTour']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="duration">Giá:</label>
                    <input type="text" id="duration" name="duration" value="<?php echo $tour[0]['Gia']?>VND" disabled>
                </div>
            </section>

            <section class="customer-info">
                <h2>Thông tin người đặt</h2>
                <div class="form-group">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $user[0]['TenKH']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo $user[0]['Email']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $user[0]['SDT']?>" disabled>
                </div>
            </section>
        </div>

        <section class="guide-selection">
            <h2>Chọn hướng dẫn viên</h2>
            <div class="form-group">
                <label for="guide">Hướng dẫn viên:</label>
                <select id="guide" name="guide" required>
                    <option value="">Chọn hướng dẫn viên</option>
                    <option value="guide1">Nguyễn Văn A</option>
                    <option value="guide2">Trần Thị B</option>
                    <option value="guide3">Lê Văn C</option>
                </select>
            </div>
        </section>

        <div class="form-group">
            <label for="total-price">Tổng tiền:</label>
            <input type="text" id="total-price" name="total-price" readonly>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Xác nhận đặt tour</button>
        </div>
    </form>
</main>
