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
        </div>
    </div>

    <section class="guide-description">
        <h2>Giới thiệu</h2>
        <p><?=$guide[0]->MoTa?></p>
    </section>

    <section class="guide-booking">
        <h2>Đặt tour với <?=$guide[0]->TenHDV?></h2>
        
        <?php foreach($tasks as $value):?>
                <div class="tour-infor">
                    <a href="index.php?controller=tour&action=detail&id=<?=$value->MaTour?>">
                        <img src="./Admin/public/img/tour/<?=$value->AnhTour?>" alt="anh" id="tour-image">
                    </a>
                    <h3><?=$value->TenTour?></h3></p>
                    <p><b>Ngày khởi hành: </b><?=date('d-m-Y', strtotime($value->NgayKH))?></p>
                    <p><b>Ngày kết thúc: </b><?=date('d-m-Y', strtotime($value->NgayKT))?></p>
                    <p id="tour-cost"><strong>Giá Tour:</strong> <span style="color: red;"><?=$value->GiaTour?>VND</span></p>
                    <p><strong>Giá HDV:</strong> <span style="color: red;"><?=$value->GiaHDV?>VND</span></p>
                    <a href="index.php?controller=calendarContent&action=index&idTask=<?=$value->MaPC?>"><button class="book-button">Đặt tour</button></a>
                </div>   
            <?php endforeach;?>
    </section>
</main>
