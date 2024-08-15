<!-- Start user-->
<div class="user">
    <button class="user-Insert__btn"><a href="#">Thêm khách hàng</a></button>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
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
                <td><?php echo $value['email']?></td>
                <td><?php echo $value['sdt']?></td>
                <td><?php echo $value['DiaChi']?></td>
                <td><?php echo $value['NgaySinh']?></td>
                <td><?php echo $value['GioiTinh']?></td>
                <td>
                    <button class="edit"><a href="index.php?controller=user&action=showForm&id=<?php echo $value['MaKH']?>">Sửa</a></button>
                    <button class="delete"><a href="index.php?controller=user&action=delete&id=<?php echo $value['MaKH']?>" style="color: red;">Xóa</a></button>
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
            <input type="text" name="TenKH" id="name" /> <br />
            <label for="name">Số điện thoại</label>
            <input type="text" name="sdt" id="name" /><br />
            <label for="name">Địa chỉ</label>
            <input type="text" name="DiaChi" id="name" /><br />
            <label for="name">Email</label>
            <input type="text" name="email" id="name" /><br />
            <label for="name">Ngày sinh</label>
            <input type="date" name="NgaySinh" id="name" /><br />
            <label for="name">Giới tính</label>
            <select  name="GioiTinh">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select> <br>
            <button type="submit" name="insert" class="insert">
                Thêm
            </button>
        </form>
    </div>
</div>
