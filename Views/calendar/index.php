<!-- calendar -->
<div class="calendar">
    <div class="title">
        <span>Lịch đặt tour</span>
        <button type="button" id="btn-close"><img src="./public/icons/xmark-solid.svg" alt="icon"></button>
    </div>
    <div class="content">
        <?php if(isset($_SESSION['user_phone'])):?>
            <?php foreach($data as $booking):?>
                <div class="sub-content">
                    <div class="icon-sub">
                        <img src="./public/icons/calendar-regular.svg" alt="icon">
                    </div>
                    <div class="infor-calendar">
                        <div>
                            <p>Mã tour: <span id="booking-id"><?php echo $booking['TourBookingID']?></span></p>
                        </div>
                        <div>
                            <p>Ngày đặt: <span id="booking-date">
                                <?php 
                                    $date = date('d/m/Y', strtotime($booking['BookingDate']));
                                    echo $date;
                                ?>
                            </span></p>
                        </div>
                        <div>
                            <p>Ngày khởi hành: <span id="departure-date"><?php echo date('d/m/Y', strtotime($booking['DepartureDate']))?></span></p>
                        </div>
                        <div>
                            <p>Điểm đến: <span id="destination"><?php echo $booking['Destination']?></span></p>
                        </div>
                        <div>
                            <p>Hướng dẫn viên: <span id="guide-name"><?php echo $booking['GuideName']?></span></p>
                        </div>
                        <div>
                            <p>Trạng thái: <span id="status"><?php echo $booking['BookingStatus']?></span></p>
                        </div>
                    </div>
                    <div class="cancel">
                        <p><a href="index.php?controller=tour&action=delete&id=<?php echo $booking['TourBookingID']?>"><span>Hủy tour</span></a></p>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        <?php if(!isset($_SESSION['user_phone'])):?>
            <h3>Chưa có thông tin đặt tour</h3>
        <?php endif;?>
    </div>
    <div class="total">
        <p>Tổng: <span id="totalBookings"></span></p>
    </div>
</div>
