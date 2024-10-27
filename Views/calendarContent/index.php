<main class="booking-form">
    <h1>Đặt Tour</h1>
    <form action="index.php?controller=calendarContent&action=payment&idUser=<?=$user[0]->MaKH?>&idTour=<?=$tour[0]->MaTour?>&idGuide=<?=$guide[0]->MaHDV?>&startDate=<?=$task->NgayKH?>&endDate=<?=$task->NgayKT?>" method="POST" id="booking-form">
        <div class="form-container">
            <section class="tour-info">
                <h2>Thông tin tour</h2>
                <div class="tour-image">
                    <img src="./Admin/public/img/tour/<?=$tour[0]->AnhTour?>" alt="anh" id="tour-image">
                </div>
                <div class="form-group">
                    <label for="tour-name">Tên tour:</label>
                    <input type="text" id="tour-name" name="tour-name" value="<?=$tour[0]->TenTour?>" readonly>
                </div>
                <div class="form-group">
                    <label for="start-date">Ngày khởi hành:</label>
                    <input type="text" id="start-date" name="start-date" value="<?=date('d-m-Y', strtotime($task->NgayKH))?>" disabled>
                </div>
                <div class="form-group">
                    <label for="end-date">Ngày kết thúc:</label>
                    <input type="text" id="end-date" name="end-date" value="<?=date('d-m-Y', strtotime($task->NgayKT))?>" disabled>
                </div>
                <div class="form-group">
                    <label for="tour-costs">Giá:</label>
                    <input class= "cost" type="text" id="tour-costs" name="tour-costs" value="<?=$tour[0]->Gia?>VND" disabled>
                </div>
            </section>

            <section class="customer-info">
                <h2>Thông tin người đặt</h2>
                <div class="form-group">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" id="fullname" name="fullname" value="<?=$user[0]->TenKH?>" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" name="phone" value="<?=$account[0]->SDT?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?=$user[0]->Email?>" disabled>
                </div>
            </section>
        </div>

        <div class="guide-info">
            <h2>Thông tin hướng dẫn viên</h2>
            <div class="guide-image">
                <img src="./Admin/public/img/guide/<?=$guide[0]->AnhHDV?>" alt="anh" id="guide-image">
            </div>
            <div class="guide-content">
                <div class="form-group">
                    <label for="guide-name">Hướng dẫn viên:</label>
                    <input type="text" id="guide-name" name="guide-name" value="<?=$guide[0]->TenHDV?>" disabled>
                </div>
                <div class="form-group">
                    <label for="guide-costs">Giá:</label>
                    <input class= "cost" type="text" id="guide-costs" name="guide-costs" value="<?=$guide[0]->Gia?>VND" disabled>
                </div>
            </div>
        </div>

        <div class="form-group" id="payment-group">
            <label for="total-price">Hình thức thanh toán:</label>
            <select>
                <option>MoMo</option>
            </select>
        </div>

        <div class="form-group" id="total-group">
            <label for="total-price">Tổng tiền:</label>
            <input type="text" id="total-price" name="total-price" readonly>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit" name="payUrl">Xác nhận đặt Tour</button>
        </div>
    </form>
</main>
