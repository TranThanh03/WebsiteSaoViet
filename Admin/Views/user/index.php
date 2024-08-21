<!-- Start user-->
<div class="user">
    <button class="user-Insert__btn"><a href="#">Thêm khách hàng</a></button>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Tên tài khoản</th>
                <th>Mật khẩu</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;?>
            <?php foreach($data as $value):?>
                <?php $i++;?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value['TenKH']?></td>
                        <td><?php echo $value['SDT']?></td>
                        <td><?php echo $value['Email']?></td>
                        <td><?php echo $value['TenTK']?></td>
                        <td><?php echo $value['MatKhau']?></td>
                        <td>
                            <a href="index.php?controller=user&action=showForm&iduser=<?php echo $value['MaKH']?>&idaccount=<?php echo $value['MaTK']?>"><button class="edit">Sửa</button></a>
                            <a href="index.php?controller=user&action=delete&iduser=<?php echo $value['MaKH']?>&idaccount=<?php echo $value['MaTK']?>"><button class="delete" style="color: red;">Xóa</button></a>
                        </td>
                    </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<!-- End user -->
</div>
</div>
<div class="form__insert form__insert-user">
    <div class="form__insert-content">
        <h2>Thêm khách hàng</h2>
        <button class="close-btn close-btn__user">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <form action="index.php?controller=user&action=insert" method="post">
            <label for="name">Tên khách hàng</label>
            <input type="text" name="full-name" id="name" /> <br />
            <label for="name">Số điện thoại</label>
            <input type="text" name="number-phone" id="name" /><br />
            <label for="name">Email</label>
            <input type="text" name="email" id="name" /><br/>
            <label for="name">Tên tài khoản</label>
            <input type="text" name="username" id="name" /><br />
            <label for="name">Mật khẩu</label>
            <input type="text" name="password" id="name" /><br />
    
            <button type="submit" name="insert" class="insert">Thêm</button>
        </form>
    </div>
</div>
