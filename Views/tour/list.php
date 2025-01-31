<?php if(!empty($tours)):?>
    <div class="tour-detail">
        <h1>Danh sách các Tour</h1>
        <h3>Khám phá các tour cùng Sao Việt hấp dẫn với nhiều địa điểm du lịch tuyệt vời</h3>
        
        <div class="tour-list">
            <?php foreach($tours as $value):?>
                <a href="index.php?controller=tour&action=detail&id=<?=$value->MaTour?>" id="link-detail">
                    <div class="tour-item">
                        <img src="./Admin/public/img/tour/<?=$value->AnhTour?>" alt="anh">
                        <div class="tour-info">
                            <h2><?=$value->TenTour?></h2>
                            <p><?=$value->GioiThieu?></p>
                            <p id="cost"><strong>Giá:</strong> <?=$value->GiaTour?> VND</p>
                        </div>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
    </div>
<?php else: ?>
    <div style="width: 100%; height: 650px;">
        <h2>Không tìm được Tour phù hợp!</h2>
    </div>
<?php endif; ?>