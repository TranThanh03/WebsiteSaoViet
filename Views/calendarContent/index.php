<div class="calendar-content">
    <div><h2>Đơn đặt lịch khám</h2></div>
    <?php foreach($data as $value):?>
    <?php foreach($idUser as $user):?>
        <form id="myForm" action="index.php?controller=CalendarContent&action=booking" class="form-schedule" method="post">
            <table>
                <thead>
                    <th>
                        <img src="./Admin/public/img/doctor/<?php echo $value['anh']?>" alt="anh" id="avatar-doctor">
                        <p id="name-doctor"><?php echo $value['TenBS']?></p>
                        <input type="hidden" name="MaBS" value="<?php echo $value['MaBS']?>">
                        <input type="hidden" name="MaKhoa" value="<?php echo $value['MaKhoa']?>">
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Họ tên bệnh nhân<span>*</span></p>
                            <input id="name" name="TenKH" type="text" value="<?php echo $user['TenKH']?>">
                            <input type="hidden" name="MaKH" value="<?php echo $user['MaKH']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Giới tính<span>*</span></p>
                            <input id="radMan" type="radio" name="gender" <?php echo ($user['GioiTinh'] === 'Nam' || $user['GioiTinh'] === '') ? 'checked' : ''?> value="Nam"><span id="gender">Nam</span>
                            <input id="radWoman" type="radio" name="gender" <?php echo ($user['GioiTinh'] === 'Nữ') ? 'checked' : ''?> value="Nữ"><span id="gender">Nữ</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Số điện thoại liên hệ<span>*</span></p>
                            <input id="phone-number" type="text"  type="text" name="sdt" value="<?php echo $user['sdt']?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Ngày-tháng-năm sinh<span>*</span></p>
                            <input id="year-of-birth" type="date" name="NgaySinh" value="<?php echo $user['NgaySinh']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Địa chỉ</p>
                            <input id="address" type="text" name="DiaChi" value="<?php echo $user['DiaChi']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Chuyên khoa<span>*</span></p>
                            <input id="name-faculty" type="text" disabled value="<?php echo $value['TenKhoa']?>">
                        </td>
                    </tr>
                    <tr>
                        <td><p>Thời gian khám<span>*</span></p>
                            <input type="date" id="date" name="NgayKham">
                            <select id="time" name="ThoiGianKham">
                                <option value="8:00">8:00</option>
                                <option value="9:00">9:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Lý do khám</p>
                            <textarea id="reason" rows="4" cols="75" name="NoiDungKham"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Ghi chú</p>
                            <textarea id="note" rows="4" cols="75" name="GhiChu"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td id="notifi">
                            <i>Chú ý: <span>*</span> không được bỏ trống!</i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="color: #45C3D2;">Hình thức thanh toán</p>
                            <input type="radio" checked>Thanh toán sau tại phòng khám
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="container">
                                <p>Giá khám <span id="price"><?php echo $value['GiaKham']?></span></p>
                                <p>Phí đặt lịch <span id="cost">0</span></p>
                                <hr>
                                <p>Tổng cộng <span id="totalPrice"><?php echo $value['GiaKham']?></span></p>
                            </div>
                        </td>
                    </tr>
                    <?php if(isset($warning)):?>
                        <tr>
                            <td><p style="color: red;">
                                <?php echo $warning;?>
                            </p></td>
                        </tr>
                    <?php endif;?>
                    <tr>
                        <td><button type="submit" id="btn-submit">Xác nhận đặt khám</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    <?php endforeach;?>
    <?php endforeach;?>
</div>
<script>
document.getElementById('myForm').addEventListener('submit', function() {
    location.reload();
});
</script>