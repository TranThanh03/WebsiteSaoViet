<main class="guide-detail">
    <div class="guide-profile">
        <img src="./Admin/public/img/guide/<?php echo $data[0]['AnhHDV']?>" alt="anh hdv" class="guide-image">
        <div class="guide-info">
            <h1><?php echo $data[0]['TenHDV']?></h1>
            <p><strong>Thông tin:</strong> <?php echo $data[0]['GioiTinh']?> -
                <?php 
                    $ngaySinh = new DateTime($data[0]['NgaySinh']);
                    $ngayHienTai = new DateTime();
                    $tuoi = $ngayHienTai->diff($ngaySinh)->y;
                    
                    echo $tuoi;
                ?>
                tuổi
            </p>
            <p><strong>Số điện thoại:</strong> <?php echo $data[0]['SDT']?></p>
            <p><strong>Email:</strong> <?php echo $data[0]['Email']?></p>
            <p><strong>Đánh giá:</strong> <span id="evaluate"><?php echo $data[0]['DanhGia']?></span></p>
            <p><strong>Giá:</strong> <span style="color: red;"><?php echo $data[0]['Gia']?>VND</span></p>
        </div>
    </div>

    <section class="guide-description">
        <h2>Giới thiệu</h2>
        <p><?php echo $data[0]['MoTa']?></p>
    </section>

    <section class="guide-booking">
        <h2>Đặt tour với <?php echo $data[0]['TenHDV']?></h2>
        <div class="tour-image">
            <a href="index.php?controller=tour&action=detail&id=<?php echo $tour[0]['MaTour']?>">
                <img src="./Admin/public/img/tour/<?php echo $tour[0]['AnhTour']?>" alt="anh" id="tour-image">
            </a>
            <h3><?php echo $tour[0]['TenTour']?></h3></p>
            <p id="tour-cost"><strong>Giá:</strong> <span style="color: red;"><?php echo $tour[0]['Gia']?>VND</span></p>
            <a href="index.php?controller=calendarContent&action=index&idTour=<?php echo $tour[0]['MaTour']?>&idGuide=<?php echo $data[0]['MaHDV']?>"><button class="book-button">Đặt tour</button></a>
        </div>

        <div class="tour-content">
            <p><?php echo $tour[0]['GioiThieu']?></p>
        </div>
        
    </section>
</main>
