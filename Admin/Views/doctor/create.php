<div class="user">
    <div class=" form__insert-docter">
        <div class="form__insert-content">
            <h2>Thêm bác sĩ</h2>
            <form action="index.php?controller=doctor&action=insert" method="post" enctype="multipart/form-data">
                <label for="name">Tên bác sĩ</label>
                <input type="text" name="TenBS" id="name" /> <br />
                <label for="name">Số điện thoại</label>
                <input type="text" name="sdt" id="name" /><br />
                <label for="name">Email</label>
                <input type="text" name="email" id="name" /><br />
                <label for="name">Ngày sinh</label>
                <input type="date" name="NgaySinh" id="name" /><br />
                <label for="name">Giới tính</label>
                <select name="GioiTinh" id="">
                    <option value="">-----Giới tính-----</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select> <br>
                <label for="">Khoa</label>
                <select name="MaKhoa">
                    <option value="">-----Khoa-----</option>
                        <?php foreach($services as $value): ?>
                            <option value="<?php echo $value['MaKhoa']?>"><?php echo $value['TenKhoa']?></option>
                        <?php endforeach;?>
                </select><br>
                <label for="">Giới thiệu</label>
                <textarea name="GioiThieu" id="" cols="45" rows="10"></textarea> <br>
                <label for="avatar">Ảnh</label>
                <input type="file" name="avatar" id=""> <br>
                <label for="name">Giá khám</label>
                <input type="text" name="GiaKham" id="name" /><br />

                <button type="submit" name="insert" class="insert">
                    <a href="index.php?controller=doctor&action=index">Quay về</a>
                    
                </button>
                <button type="submit" name="insert" class="insert">
                    Thêm
                </button>
            </form>
        </div>
    </div>
</div>
    