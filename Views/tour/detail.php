<div class="tour-details">
    <h1>Tour <?=$tour[0]->TenTour?></h1>
    <div class="tour-info">
        <div class="tour-image">
            <img src="./Admin/public/img/tour/<?=$tour[0]->AnhTour?>" alt="anh Tour">
        </div>
        <div class="tour-infor">
            <h2 id="introduce-tour">Giới thiệu:</h2>
            <span id="introduce"><?=$tour[0]->GioiThieu?></span>
            <h2 id="price-tour">Giá Tour:</h2>
            <p id="price"><?=$tour[0]->Gia?>VND</p>
            <a href="index.php?controller=guide&action=index&idTour=<?=$tour[0]->MaTour?>"><button class="book-now">Đặt ngay</button></a>
        </div>
    </div>

    <div class="tour-schedule">
        <h2>Nội dung chi tiết</h2>
        <div class="tour-detail">
            <?=$tour[0]->MoTa?>
        </div>
    </div>
</div>
