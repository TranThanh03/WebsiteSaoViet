<div class="user">
    <div class="form__update form__insert-user">
        <div class="form__insert-content">
            <h2>Thêm khách hàng</h2>
            <?php foreach($data as $values):?>
            <form action="index.php?controller=user&action=update&iduser=<?php echo $values['MaKH']?>&idaccount=<?php echo $values['MaTK']?>" method="post">
                <label for="name">Tên khách hàng</label>
                <input type="text" name="full-name" id="name" value="<?php echo $values['TenKH']?>"/> <br />
                <label for="name">Số điện thoại</label>
                <input type="text" name="number-phone" id="name" value="<?php echo $values['SDT']?>"/><br />
                <label for="name">Email</label>
                <input type="text" name="email" id="name" value="<?php echo $values['Email']?>"/><br />
                <label for="name">Tên tài khoản</label>
                <input type="text" name="username" id="name" value="<?php echo $values['TenTK']?>"/><br />
                <label for="name">Mật khẩu</label>
                <input type="text" name="password" id="name" value="<?php echo $values['MatKhau']?>"/><br />
                <button type="submit" name="insert" class="insert">Cập nhật</button>
                <button>
                    <a href="index.php?controller=user&action=index">Quay về</a>
                </button>
            </form>
            <?php endforeach;?>
            <br><br>
        </div>
    </div>
</div>
