<div class="notifi">
    <div class="title">
        <input type="hidden" id="code" value="<?=$code ?? ''?>">
        <p id="message"><?=$message ?? ''?></p>
    </div>
    <div class="content">
        <p id="countdown"></p>
    </div>
</div>

<div class="guide">
    <div class="main">
        <div class="insert-guide">
            <div class="insert-content">
                <h2>Thêm hướng dẫn viên</h2>
                <form action="index.php?controller=guide&action=create" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên hướng dẫn viên</label>
                        <input type="text" name="TenHDV" id="name" value="<?=$_POST['TenHDV'] ?? ''?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" name="SDT" id="phone" required pattern="[0-9]{10}" value="<?=$_POST['SDT'] ?? ''?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="Email" id="email" required value="<?=$_POST['Email'] ?? ''?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="birthday">Ngày sinh</label>
                        <input type="date" name="NgaySinh" id="birthday" required value="<?=$_POST['NgaySinh'] ?? ''?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <select name="GioiTinh" id="gender">
                            <option value="Nam">Nam</option>
                            <option value="Nữ" <?= isset($_POST['GioiTinh']) && $_POST['GioiTinh'] == "Nữ" ? "selected" : ""?>>Nữ</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="MoTa" id="MoTa" rows="5" required><?=$_POST['MoTa'] ?? ''?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="avatar">Ảnh</label>
                        <div class="input-wrapper">
                            <img class="avatar-img" src="./public/img/no-image.png" alt="Ảnh đại diện" id="avatar-preview"/>
                            <input type="file" name="avatar-input" id="avatar" class="avatar-input" required/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="rating">Đánh giá</label>
                        <select id="rating" name="DanhGia">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <option value="<?=$i?>" <?=isset($_POST['DanhGia']) && $_POST['DanhGia'] == $i ? "selected" : ""?>><?= $i ?> sao</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="button-group">
                        <button type="submit" name="btn-insert" class="btn btn-primary">Thêm</button>
                        <a href="index.php?controller=guide&action=index" class="btn btn-secondary">Quay về</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace("GioiThieu");
    CKEDITOR.replace("MoTa");
</script>