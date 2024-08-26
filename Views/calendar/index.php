<?php if(isset($_SESSION['username'])):?> 
    <?php if(!empty($data)):?>    
        <main>
            <div class="container">
                <div class="tour-list">
                    <div class="tour-item">
                        <img src="/images/tour_1.jpg" alt="Hạ Long Bay">
                        <div class="tour-info">
                            <h3>Hạ Long Bay</h3>
                            <p><strong>Mã tour:</strong> T001</p>
                            <p><strong>Ngày đặt:</strong> 2024-07-15</p>
                            <p><strong>Ngày khởi hành:</strong> 2024-08-01</p>
                            <p><strong>Hướng dẫn viên:</strong> Nguyễn Văn A</p>
                            <p class="status-confirmed"><strong>Trạng thái:</strong> Đã xác nhận</p>
                        </div>
                    </div>
            
                    <div class="tour-item">
                        <img src="/images/tour_2.jpg" alt="Phú Quốc">
                        <div class="tour-info">
                            <h3>Phú Quốc</h3>
                            <p><strong>Mã tour:</strong> T002</p>
                            <p><strong>Ngày đặt:</strong> 2024-08-10</p>
                            <p><strong>Ngày khởi hành:</strong> 2024-08-20</p>
                            <p><strong>Hướng dẫn viên:</strong> Trần Thị B</p>
                            <p class="status-pending"><strong>Trạng thái:</strong> Đang chờ xác nhận</p>
                        </div>
                    </div>
            
                    <div class="tour-item">
                        <img src="/images/tour_3.jpg" alt="Hội An">
                        <div class="tour-info">
                            <h3>Hội An</h3>
                            <p><strong>Mã tour:</strong> T003</p>
                            <p><strong>Ngày đặt:</strong> 2024-06-01</p>
                            <p><strong>Ngày khởi hành:</strong> 2024-07-01</p>
                            <p><strong>Hướng dẫn viên:</strong> Lê Văn C</p>
                            <p class="status-cancelled"><strong>Trạng thái:</strong> Đã hủy</p>
                        </div>
                    </div>
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