<div class="user">
    <div class="form__update form__insert-user">
        <div class="form__insert-content">
            <h2>Thêm khách hàng</h2>
            <?php foreach($data as $values):?>
            <form action="index.php?controller=user&action=update&id=<?php echo $values['MaKH']?>" method="post">
                <label for="name">Tên khách hàng</label>
                <input type="text" name="TenKH" id="name" value="<?php echo $values['TenKH']?>"/> <br />
                <label for="name">Số điện thoại</label>
                <input type="text" name="sdt" id="name" value="<?php echo $values['sdt']?>"/><br />
                <label for="name">Địa chỉ</label>
                <input type="text" name="DiaChi" id="name" value="<?php echo $values['DiaChi']?>"/><br />
                <label for="name">Email</label>
                <input type="text" name="email" id="name" value="<?php echo $values['email']?>"/><br />
                <label for="name">Ngày sinh</label>
                <input type="date" name="NgaySinh" id="name" value="<?php echo $values['NgaySinh']?>"/><br />
                <label for="name">Giới tính</label>
                <select  name="GioiTinh">
                    <option value="Nam" <?php echo ($values['GioiTinh'] === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo ($values['GioiTinh'] !== 'Nam') ? 'selected' : ''; ?>>Nữ</option>
                </select> <br>
                <button type="submit" name="insert" class="insert">
                    Sửa
                </button>
                <button>
                    <a href="index.php?controller=user&action=index">Quay về</a>
                </button>
            </form>
            <?php endforeach;?>
        </div>
    </div>
</div>
