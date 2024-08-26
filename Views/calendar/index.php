<?php if(isset($_SESSION['username'])):?> 
    <?php if(!empty($arrayData)):?> 
        <main>
            <div class="container">
                <div class="tour-list">
                    <?php foreach($arrayData as $value):?>
                        <div class="tour-item">
                            <a href="index.php?controller=tour&action=detail&id=<?php echo $value[0]['MaTour']?>">
                                <img src="./Admin/public/img/tour/<?php echo $value[0]['AnhTour']?>" alt="anh">
                            </a>
                            <div class="tour-info">
                                <h3><?php echo $value[0]['TenTour']?></h3>
                                <p><strong>Mã lịch đặt:</strong> <?php echo $value[0]['MaLD']?></p>
                                <p><strong>Thời gian đặt:</strong> 
                                    <?php 
                                        $datetime = $value[0]['ThoiGian'];
                                        $date = new DateTime($datetime);
                                        echo $date->format('H:i:s d-m-Y');
                                    ?>
                                </p>
                                <p><strong>Hướng dẫn viên:</strong> 
                                    <a href="index.php?controller=guide&action=detail&id=<?php echo $value[0]['MaHDV']?>"><?php echo $value[0]['TenHDV']?></a>
                                </p>
                                <p><strong>Tổng tiền:</strong> <span style="color: red;"><?php echo $value[0]['TongTien']?>VND</span></p>
                                <p class="status-confirmed"><strong>Trạng thái:</strong> <?php echo $value[0]['TrangThai']?></p>
                                
                                <?php if($value[0]['TrangThai'] === 'Đang xử lý'):?>
                                <a href="index.php?controller=calendar&action=cancel&id=<?php echo $value[0]['MaLD']?>">
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
            <h2>Chưa có tour nào được đặt. Hãy tìm hiểu các lựa chọn du lịch tuyệt vời cùng Sao Việt Traveloka!</h2>
        </main>
    <?php endif;?>  
<?php else:?>
    <main style="height: 500px; padding: 10px 20px;">
        <h2>Không có dữ liệu!</h2>
    </main>
<?php endif;?>    