<?php if(isset($_SESSION['username'])):?> 
    <?php if(!empty($calendars)):?> 
        <main>
            <div class="container">
                <h1>Danh sách Tour đã đặt</h1>
                <div class="tour-list">
                    <?php foreach($calendars as $value):?>
                        <div class="tour-item">
                            <a href="index.php?controller=tour&action=detail&id=<?=$value[0]->MaTour?>">
                                <img src="./Admin/public/img/tour/<?=$value[0]->AnhTour?>" alt="anh">
                            </a>
                            <div class="tour-info">
                                <h3><?=$value[0]->TenTour?>(<span id="startDate"><?=date('d/m/Y', strtotime($value[0]->NgayKH))?></span> - <span id="endDate"><?=date('d/m/Y', strtotime($value[0]->NgayKT))?></span>)</h3>
                                <p><strong>Mã lịch đặt:</strong> <?=$value[0]->MaLD?></p>
                                <p><strong>Thời gian đặt:</strong> 
                                    <?php 
                                        $datetime = $value[0]->ThoiGianDat;
                                        $date = new DateTime($datetime);
                                        echo $date->format('H:i:s d-m-Y');
                                    ?>
                                </p>
                                <p><strong>Hướng dẫn viên:</strong> 
                                    <a href="index.php?controller=guide&action=detail&id=<?=$value[0]->MaHDV?>"><?=$value[0]->TenHDV?></a>
                                </p>
                                <p><strong>Tổng tiền:</strong> <span style="color: red;"><?=$value[0]->TongTien?>VND</span></p>
                                <p class="status-confirmed"><strong>Trạng thái:</strong> <?=$value[0]->TrangThai?></p>
                                
                                <?php if($value[0]->TrangThai === 'Đang xử lý'):?>
                                <a href="index.php?controller=calendar&action=cancel&id=<?=$value[0]->MaLD?>">
                                    <button>Hủy Tour</button>
                                </a>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </main>
    <?php else:?>
        <main style="height: 500px; padding: 10px 20px;">
            <h2>Chưa có tour nào được đặt. Hãy tìm hiểu các lựa chọn du lịch tuyệt vời cùng Sao Việt!</h2>
        </main>
    <?php endif;?>  
<?php else:?>
    <main style="height: 500px; padding: 10px 20px;">
        <h2>Không có dữ liệu!</h2>
    </main>
<?php endif;?> 

<div class="notifi">
    <div class="title">
        <input type="hidden" id="code" value="<?=isset($code) ? $code : ''?>">
        <p><?=isset($message) ? $message : ''?></p>
    </div>
    <div class="content">
        <p id="countdown"></p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const code = document.querySelector("#code");

        if(code.value) {
            window.history.replaceState(null, null, "http://localhost/WebsiteSaoViet/index.php?controller=calendar&action=index");

            const notifi = document.querySelector(".notifi");
            const countdown = document.getElementById("countdown");
            const message =document.getElementById("message");

            let pos = -100;
            notifi.style.opacity = 1;
            const slideDown = setInterval(() => {
                if (pos >= 0) {
                    clearInterval(slideDown);
                } else {
                    pos += 5;
                    notifi.style.top = pos + "px";
                }
            }, 20);

            let width = 0;
            const countdownDuration = 2;
            const interval = 30;
            const totalSteps = countdownDuration * 1000 / interval;

            const countdownTimer = setInterval(() => {
                width += (320 / totalSteps);
                countdown.style.width = width + "px";
                countdown.style.height = "5px";
                
                if(code.value == 0) {
                    countdown.style.backgroundColor = "green";
                }
                else {
                    message.style.color = "red";
                    notifi.style.border = "2px solid red";
                    countdown.style.backgroundColor = "red";
                }

                if (width > 320) {
                    clearInterval(countdownTimer);

                    setTimeout(() => {
                        notifi.style.transition = "opacity 1s";
                        notifi.style.opacity = 0;
                    }, 100);
                }
            }, interval);
        }
    })
</script>