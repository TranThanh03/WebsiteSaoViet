<main class="guide-detail">
    <div class="guide-profile">
        <img src="./Admin/public/img/guide/<?=$guide[0]->AnhHDV?>" alt="anh hdv" class="guide-image">
        <div class="guide-info">
            <h1><?=$guide[0]->TenHDV?></h1>
            <p><strong>Thông tin:</strong> <?=$guide[0]->GioiTinh?> -
                <?php 
                    $ngaySinh = new DateTime($guide[0]->NgaySinh);
                    $ngayHienTai = new DateTime();
                    $tuoi = $ngayHienTai->diff($ngaySinh)->y;
                    
                    echo $tuoi;
                ?>
                tuổi
            </p>
            <p><strong>Số điện thoại:</strong> <?=$guide[0]->SDT?></p>
            <p><strong>Email:</strong> <?=$guide[0]->Email?></p>
            <p><strong>Đánh giá:</strong> <span id="evaluate"><?=$guide[0]->DanhGia?></span></p>
            <p><strong>Giá:</strong> <span style="color: red;"><?=$guide[0]->Gia?>VND</span></p>
        </div>
    </div>

    <section class="guide-description">
        <h2>Giới thiệu</h2>
        <p><?=$guide[0]->MoTa?></p>
    </section>

    <section class="guide-booking">
        <h2>Đặt tour với <?=$guide[0]->TenHDV?></h2>
        <div class="tour-image">
            <a href="index.php?controller=tour&action=detail&id=<?=$tour[0]->MaTour?>">
                <img src="./Admin/public/img/tour/<?=$tour[0]->AnhTour?>" alt="anh" id="tour-image">
            </a>
            <h3><?=$tour[0]->TenTour?></h3></p>
            <p id="tour-cost"><strong>Giá:</strong> <span style="color: red;"><?=$tour[0]->Gia?>VND</span></p>
            <a href="index.php?controller=calendarContent&action=index&idTour=<?=$tour[0]->MaTour?>&idGuide=<?=$guide[0]->MaHDV?>"><button class="book-button">Đặt tour</button></a>
        </div>

        <div class="tour-content">
            <p><?=$tour[0]->GioiThieu?></p>
        </div>
        
    </section>
</main>
