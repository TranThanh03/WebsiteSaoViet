<div class="doctor">
    <?php foreach($data as $detail):?>
        <div class="infor-doctor">
            <div><img src="./Admin/public/img/doctor/<?php echo $detail['anh']?>" alt="anh" id="avatar-doctor"></div>
            <div>
                <p id="name-doctor"><?php echo $detail['TenBS']?></p>
                <p id="name-faculty"><?php echo $detail['TenKhoa']?></p>
                <p id="describe">
                    Phó Trưởng khoa Hô hấp - Cơ xương khớp, Bệnh viện Nhân dân Gia Định\
                    Nhiều năm kinh nghiệm trong khám và điều trị bệnh lý về Nội Cơ xương khớp. Bác sĩ chỉ nhận khám trường hợp ngoại Tim mạch - Lồng ngực\
                    Bác sĩ nhận khám từ 15 tuổi trở lên\
                </p>
                <p>Đánh giá: 
                    <span id="evaluate"><?php echo $detail['DanhGia']?></span>
                </p>
                <p>Giá khám: <span id="price"><?php echo $detail['GiaKham']?></span></p>
                <a href="index.php?controller=calendarContent&action=index&id=<?php echo $detail['MaBS']?>"><button id="btn-calendar">Đặt lịch</button></a>
            </div>
        </div>
        <div class="introduce">
            <?php echo $detail['GioiThieu']?>
        </div>
    <?php endforeach;?>
</div>