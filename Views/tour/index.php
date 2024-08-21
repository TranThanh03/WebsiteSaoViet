<div class="list-doctor">
    <div><h2>Danh sách bác sĩ</h2></div>
    <div class="doctor">
        <?php foreach($data as $doctor):?>
            <div class="sub-doctor">
                <a href="index.php?controller=doctor&action=detail&id=<?php echo $doctor['MaBS']?>">
                    <img id="img-doctor" src="./Admin/public/img/doctor/<?php echo $doctor['anh']?>" alt="anh">
                    <p id="name-doctor"><?php echo $doctor['TenBS']?></p>
                    <p id="name-faculty"><?php echo $doctor['TenKhoa']?></p>
                </a>
            </div>
        <?php endforeach;?>
    </div>
</div>