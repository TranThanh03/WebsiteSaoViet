<?php if(!empty($tours)):?>
    <div class="tour-detail">
        <h1>Danh sách các Tour</h1>
        <p>Khám phá các tour cùng Sao Việt hấp dẫn với nhiều địa điểm du lịch tuyệt vời</p>
        
        <div class="tour-list">
            <?php foreach($tours as $value):?>
                <div class="tour-item">
                    <img src="./Admin/public/img/tour/<?=$value->AnhTour?>" alt="anh">
                    <div class="tour-info">
                        <h2><?=$value->TenTour?></h2>
                        <p><?=$value->GioiThieu?></p>
                        <p><strong>Giá:</strong> <?=$value->Gia?> VND</p>
                        <a href="index.php?controller=tour&action=detail&id=<?=$value->MaTour?>" class="btn-detail">Xem chi tiết</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?php else: ?>
    <div style="width: 100%; height: 650px;">
        <h2>Không tìm được Tour phù hợp!</h2>
    </div>
<?php endif; ?>