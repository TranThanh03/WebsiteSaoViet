<div class="user">
    <div class="form__update form__insert-user">
        <div class="form__insert-content">
            <h2>Sửa thông tin hướng dẫn viên</h2><br>
            <?php foreach($dataGuide as $values):?>
            <form action="index.php?controller=guide&action=update&id=<?php echo $values['MaHDV']?>" method="post" enctype="multipart/form-data">
                <label for="name">Tên hướng dẫn viên</label>
                <input type="text" name="TenHDV" id="name" value="<?php echo $values['TenHDV']?>"/> <br>
                <label for="name">Số điện thoại</label>
                <input type="text" name="SDT" id="name" value="<?php echo $values['SDT']?>"/><br>
                <label for="name">Email</label>
                <input type="text" name="Email" id="name" value="<?php echo $values['Email']?>"/><br>
                <label for="name">Ngày sinh</label>
                <input type="date" name="NgaySinh" id="name" value="<?php echo $values['NgaySinh']?>"/><br>
                <label for="name">Giới tính</label>
                <select  name="GioiTinh">
                    <option value="Nam" <?php echo ($values['GioiTinh'] === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo ($values['GioiTinh'] !== 'Nam') ? 'selected' : ''; ?>>Nữ</option>
                </select> <br>
                <label for="tour">Tours</label>
                <select id="tour" name="MaTour">
                    <?php foreach($dataTour as $value):?>
                        <option value="<?php echo $value['MaTour']?>" <?php echo ($value['MaTour'] === $values['MaTour']) ? 'selected' : ''; ?>>Mã tour <?php echo $value['MaTour']?>: <?php echo $value['TenTour']?></option>
                    <?php endforeach;?>
                </select> <br>
                <label for="mota">Mô tả</label>
                <textarea name="MoTa" id="mota" cols="45" rows="10"><?php echo $values['MoTa']?></textarea> <br>
                <label for="avatar">Ảnh</label>
                <input class="avatar-input-update" type="file" name="avatarUpdate" id="anh" > <br>
                <img class="avata-img" src="../Admin/public/img/guide/<?php echo $values['AnhHDV']?>" alt="ảnh"
                    style="width: 200px; margin-left: 155px;"> <br>
                <label for="gia">Giá</label>
                <input type="text" name="Gia" id="gia" value="<?php echo $values['Gia']?>"/><br>
                <label for="danhgia">Đánh giá</label>
                <select id="tour" name="DanhGia">
                    <?php for($i=1; $i<=5; $i++):?>
                        <option value="<?php echo $i?>" <?php echo ($values['DanhGia'] == $i) ? 'selected' : '';?>><?php echo $i?></option>
                    <?php endfor;?>
                </select> <br>
                <button type="submit" name="update" class="insert">Cập nhật</button>
                <button>
                    <a href="index.php?controller=guide&action=index">Quay về</a>
                </button>
            </form>
            <?php endforeach;?>
            <br><br>
        </div>
    </div>
</div>
