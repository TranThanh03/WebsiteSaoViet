<div class="tour-detail">
    <h1>Danh sách các Tour</h1>
    <p>Khám phá các tour cùng Sao Việt hấp dẫn với nhiều địa điểm du lịch tuyệt vời</p>
    
    <div class="tour-list">
        <?php foreach($data as $value):?>
            <div class="tour-item">
                <img src="./Admin/public/img/tour/<?php echo $value['AnhTour']?>" alt="anh">
                <div class="tour-info">
                    <h2><?php echo $value['TenTour']?></h2>
                    <p><?php echo $value['GioiThieu']?></p>
                    <p><strong>Giá:</strong> <?php echo $value['Gia']?> VND</p>
                    <a href="index.php?controller=tour&action=detail&id=<?php echo $value['MaTour']?>" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>