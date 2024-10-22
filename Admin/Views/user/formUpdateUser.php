<div class="user">
    <div class="form__update form__insert-user">
        <div class="form__insert-content">
            <h2>Sửa thông tin khách hàng</h2>
            <?php foreach($users as $values):?>
            <form action="index.php?controller=user&action=update&iduser=<?=$values->MaKH?>&idaccount=<?=$values->MaTK?>" method="post">
                <label for="name">Tên khách hàng</label>
                <input type="text" name="full-name" id="name" value="<?=$values->TenKH?>"/> <br />
                <label for="name">Số điện thoại</label>
                <input type="text" name="number-phone" id="name" value="<?=$values->SDT?>"/><br />
                <label for="name">Email</label>
                <input type="text" name="email" id="name" value="<?=$values->Email?>"/><br />
                <label for="name">Mật khẩu</label>
                <input type="text" name="password" id="name" value="<?=$values->MatKhau?>"/><br />
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
