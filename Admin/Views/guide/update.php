<div class="user">
    <div class="form__update form__insert-user">
        <div class="form__insert-content">
            <h2>Sửa thông tin hướng dẫn viên</h2><br>
            <?php foreach($guides as $value):?>
            <form action="index.php?controller=guide&action=update&id=<?=$value->MaHDV?>" method="post" enctype="multipart/form-data">
                <label for="name">Mã hướng dẫn viên</label>
                <input type="text" name="MaHDV" id="name" value="<?=$value->MaHDV?>" disabled/> <br>
                <label for="name">Tên hướng dẫn viên</label>
                <input type="text" name="TenHDV" id="name" value="<?=$value->TenHDV?>"/> <br>
                <label for="name">Số điện thoại</label>
                <input type="text" name="SDT" id="name" value="<?=$value->SDT?>"/><br>
                <label for="name">Email</label>
                <input type="text" name="Email" id="name" value="<?=$value->Email?>"/><br>
                <label for="name">Ngày sinh</label>
                <input type="date" name="NgaySinh" id="name" value="<?=$value->NgaySinh?>"/><br>
                <label for="name">Giới tính</label>
                <select  name="GioiTinh">
                    <option value="Nam" <?=($value->GioiTinh === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?=($value->GioiTinh !== 'Nam') ? 'selected' : ''; ?>>Nữ</option>
                </select> <br>
                <label for="mota">Mô tả</label>
                <textarea name="MoTa" id="mota" cols="45" rows="10"><?=$value->MoTa?></textarea> <br>
                <label for="avatar">Ảnh</label>
                <input class="avatar-input-update" type="file" name="avatarUpdate" id="anh" > <br>
                <img class="avata-img" src="../Admin/public/img/guide/<?=$value->AnhHDV?>" alt="ảnh"
                    style="width: 200px; margin-left: 155px;"> <br>
                <label for="gia">Giá</label>
                <input type="text" name="Gia" id="gia" value="<?=$value->Gia?>"/><br>
                <label for="danhgia">Đánh giá</label>
                <select id="tour" name="DanhGia">
                    <?php for($i=1; $i<=5; $i++):?>
                        <option value="<?=$i?>" <?=($value->DanhGia == $i) ? 'selected' : '';?>><?=$i?></option>
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


