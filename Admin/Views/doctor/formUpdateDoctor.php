<div class="user">
    <div class="form__update form__insert-user">
        <div class="form__insert-content">
            <h2>Thêm khách hàng</h2>
            <?php foreach($data as $values):?>
            <form action="index.php?controller=doctor&action=update&id=<?php echo $values['MaBS']?>" method="post" enctype="multipart/form-data">
                <label for="name">Tên khách hàng</label>
                <input type="text" name="TenBS" id="name" value="<?php echo $values['TenBS']?>"/> <br />
                <label for="name">Số điện thoại</label>
                <input type="text" name="sdt" id="name" value="<?php echo $values['sdt']?>"/><br />
                <label for="name">Email</label>
                <input type="text" name="email" id="name" value="<?php echo $values['email']?>"/><br />
                <label for="name">Ngày sinh</label>
                <input type="date" name="NgaySinh" id="name" value="<?php echo $values['NgaySinh']?>"/><br />
                <label for="name">Giới tính</label>
                <select  name="GioiTinh">
                    <option value="Nam" <?php echo ($values['GioiTinh'] === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo ($values['GioiTinh'] !== 'Nam') ? 'selected' : ''; ?>>Nữ</option>
                </select> <br>
                <label for="">Khoa</label>
                <select name="MaKhoa">
                    <option value="">-----Khoa-----</option>
                    <?php foreach($services as $value):?>
                        <option value="<?php echo $value['MaKhoa']?>" <?php echo ($value['MaKhoa'] === $values['MaKhoa']) ? 'selected' : ''; ?>><?php echo $value['TenKhoa']?></option>
                    <?php endforeach;?>
                </select> <br>
                <label for="">Giới thiệu</label>
                <textarea name="GioiThieu" id="" cols="45" rows="10"><?php echo $values['GioiThieu']?></textarea> <br>
                <label for="avatar">Ảnh</label>
                <input class="avatar-input-update" type="file" name="avatarUpdate" id="" > <br>
                <label for="">Hình ảnh</label>
                <img class="avata-img" src="../Admin/public/img/doctor/<?php echo $values['anh']?>" alt="ảnh"
                    style="width: 100px;"> <br>
                <label for="name">Giá khám</label>
                <input type="text" name="GiaKham" id="name" value="<?php echo $values['GiaKham']?>"/><br />
                <button type="submit" name="update" class="insert">
                    Sửa
                </button>
                <button>
                    <a href="index.php?controller=doctor&action=index">Quay về</a>
                </button>
            </form>
            <?php endforeach;?>
        </div>
    </div>
</div>
