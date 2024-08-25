<div class="tour-details">
    <h1>Chi tiết tour <?php echo $data[0]['TenTour']?> </h1>
    <div class="tour-info">
        <div class="tour-image">
            <img src="./Admin/public/img/tour/<?php echo $data[0]['AnhTour']?>" alt="anh Tour">
        </div>
        <div class="tour-summary">
            <h2>Giới thiệu</h2>
            <p><?php echo $data[0]['GioiThieu']?></p>
            <h2>Giá Tour</h2>
            <p class="price"><?php echo $data[0]['Gia']?>VND</p>
            <a href="index.php?controller=calendarContent&action=index&id=<?php echo $data[0]['MaTour']?>"><button class="book-now">Đặt ngay</button></a>
        </div>
    </div>

    <div class="tour-schedule">
        <h2>Nội dung chi tiết</h2>
        <div class="tour-detail">
            <?php echo $data[0]['MoTa']?>
        </div>
    </div>
</div>
