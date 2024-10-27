<?php if(isset($_REQUEST['idTour'])): ?>
    <main>
        <h1 style="color: red;">Vui lòng chọn hướng dẫn viên du lịch!</h1>

        <section class="guide-list">
            <h2>Danh sách hướng dẫn viên</h2>
            <div class="guide-grid">
                <?php foreach($guides as $item):?>
                    <?php foreach($item as $value):?>
                        <div class="guide-card">
                            <a href="index.php?controller=calendarContent&action=index&idTour=<?=$_REQUEST['idTour']?>&idGuide=<?=$value->MaHDV?>">
                                <img src="./Admin/public/img/guide/<?=$value->AnhHDV?>" alt="anh">
                                <h3><?=$value->TenHDV?></h3>
                                <p>Thông tin: <?=$value->GioiTinh?> - 
                                            <?php 
                                                $ngaySinh = new DateTime($value->NgaySinh);
                                                $ngayHienTai = new DateTime();
                                                $tuoi = $ngayHienTai->diff($ngaySinh)->y;
                                                
                                                echo $tuoi;
                                            ?>
                                            tuổi</p>
                                <p>Ngày khởi hành: <span id="startDate"><?=date('d-m-Y',strtotime($value->NgayKH))?></span></p>
                                <p>Ngày kết thúc: <span id="endDate"><?=date('d-m-Y',strtotime($value->NgayKT))?></span></p>
                                <p>Đánh giá: <span id="evaluate"><?=$value->DanhGia?></span></p>
                                <p>Giá: <span style="color: red;"><?=$value->Gia?>VND</span></p>
                                <p id="linkDetail"><button type="button" onclick="window.location.href='index.php?controller=guide&action=detail&id=<?=$value->MaHDV?>'; return false;">Xem chi tiết</button></p>
                                <p></p>
                            </a>
                        </div>
                    <?php endforeach;?>
                <?php endforeach;?>
            </div>
        </section>
    </main>
<?php else: ?>
    <main>
        <h1>Hướng dẫn viên du lịch</h1>
        
        <section class="intro">
            <h2>Đội ngũ hướng dẫn viên chuyên nghiệp</h2>
            <p>Tại Sao Việt Travel, chúng tôi tự hào có đội ngũ hướng dẫn viên giàu kinh nghiệm, am hiểu văn hóa và nhiệt tình. Họ sẽ đồng hành cùng bạn trong mọi hành trình, mang đến những trải nghiệm du lịch đáng nhớ.</p>
        </section>

        <section class="guide-list">
            <h2>Danh sách hướng dẫn viên</h2>
            <div class="guide-grid">
                <?php foreach($guides as $value):?>
                    <div class="guide-card">
                        <img src="./Admin/public/img/guide/<?=$value->AnhHDV?>" alt="anh">
                        <h3><?=$value->TenHDV?></h3>
                        <p>Thông tin: <?=$value->GioiTinh?> - 
                                    <?php 
                                        $ngaySinh = new DateTime($value->NgaySinh);
                                        $ngayHienTai = new DateTime();
                                        $tuoi = $ngayHienTai->diff($ngaySinh)->y;
                                        
                                        echo $tuoi;
                                    ?>
                                    tuổi</p>
                        <p>Đánh giá: <span id="evaluate"><?=$value->DanhGia?></span></p>
                        <p>Giá: <span style="color: red;"><?=$value->Gia?>VND</span></p>
                        <p style="text-align: center;"><a href="index.php?controller=guide&action=detail&id=<?=$value->MaHDV?>"><button type="button">Xem chi tiết</button></a></p>
                    </div>
                <?php endforeach;?>
            </div>
        </section>

        <section class="why-choose">
            <h2>Tại sao chọn hướng dẫn viên của chúng tôi?</h2>
            <ul>
                <li>Kiến thức sâu rộng về lịch sử, văn hóa và địa phương</li>
                <li>Kỹ năng giao tiếp và thuyết trình xuất sắc</li>
                <li>Linh hoạt và sáng tạo trong việc xử lý tình huống</li>
                <li>Tận tâm và chu đáo với khách hàng</li>
                <li>Thường xuyên được đào tạo và cập nhật kiến thức mới</li>
            </ul>
        </section>
    </main>
<?php endif; ?>