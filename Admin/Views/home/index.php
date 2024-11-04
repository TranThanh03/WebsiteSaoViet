<div class="home">
    <div class="admin-dashboard">
        <div class="dashboard-header">
            <h1>Trang quản trị Sao Việt</h1>
            <p>Chào mừng bạn trở lại, Admin!</p>
        </div>

        <div class="dashboard-info">
            <div class="admin-profile">
                <h3>Thông tin người quản trị</h3>
                <p><b>Tên:</b> Admin</p>
                <p><b>Vai trò:</b> Quản trị viên</p>
                <p><b>Email:</b> admin@saoviet.com</p>
            </div>
            <div class="dashboard-stats">
                <div class="stat-card">
                    <h3>Khách hàng</h3>
                    <p><?=$totalUser ?? 0?></p>
                </div>
                <div class="stat-card">
                    <h3>Tours đang hoạt động</h3>
                    <p><?=$totalTour ?? 0?></p>
                </div>
                <div class="stat-card">
                    <h3>Đơn đặt tour thành công</h3>
                    <p><?=$totalCalendar ?? 0?></p>
                </div>
                <div class="stat-card">
                    <h3>Tổng doanh thu</h3>
                    <p><?=$totalCost ?? 0?></p>
                    <p style="font-size: 18px;">VND</p>
                </div>
            </div>
        </div>

        <div class="dashboard-content">
            <div class="recent-orders">
                <h2>Đơn hàng mới</h2>
                <table style="text-align: center;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Khách hàng</th>
                            <th>Tour</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($latestCalendars)) {
                                foreach($latestCalendars as $value) {?>
                                <tr>
                                    <td><?=$value->MaLD?></td>
                                    <td><?=$value->TenKH?></td>
                                    <td><?=$value->TenTour?></td>
                                    <td><?=date('H:i:s d/m/Y', strtotime($value->ThoiGianDat))?></td>
                                    <td><?=$value->TrangThai?></td>
                                </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>

            <div class="dashboard-updates">
                <h2>Cập nhật gần đây</h2>
                <ul>
                    <li>Tour Hà Nội - Sapa đã được cập nhật</li>
                    <li>Khách hàng mới đăng ký tài khoản</li>
                    <li>Báo cáo doanh thu tháng đã được tạo</li>
                </ul>
            </div>

            <div class="important-notices">
                <h2>Thông báo quan trọng</h2>
                <ul>
                    <li>Kiểm tra và cập nhật thông tin tour mỗi tuần.</li>
                    <li>Liên hệ hỗ trợ khách hàng với các đơn đặt hàng chưa xử lý.</li>
                    <li>Hoàn thiện báo cáo doanh thu cuối tháng.</li>
                </ul>
            </div>
        </div>

        <div class="highlighted-tours">
            <h2>Tour nổi bật</h2>
            <ul>
                <li>Tour Hạ Long - 3 ngày 2 đêm</li>
                <li>Tour Phú Quốc - 4 ngày 3 đêm</li>
                <li>Tour Đà Lạt - 2 ngày 1 đêm</li>
            </ul>
        </div>
    </div>
</div>