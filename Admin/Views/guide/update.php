<div class="guide">
    <div class="form-update">
        <div class="update-content">
            <h2>Sửa thông tin hướng dẫn viên</h2>
                <form action="index.php?controller=guide&action=update&id=<?= $guide[0]->MaHDV ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="guide-id">Mã hướng dẫn viên</label>
                        <div class="input-wrapper">
                            <input type="text" name="MaHDV" id="guide-id" value="<?= $guide[0]->MaHDV ?>" disabled required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="guide-name">Tên hướng dẫn viên</label>
                        <div class="input-wrapper">
                            <input type="text" name="TenHDV" id="guide-name" value="<?= $guide[0]->TenHDV ?>" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <div class="input-wrapper">
                            <input type="tel" name="SDT" id="phone" pattern="[0-9]{9,10}" value="<?= $guide[0]->SDT ?>" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-wrapper">
                            <input type="text" name="Email" id="email" value="<?= $guide[0]->Email ?>" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Ngày sinh</label>
                        <div class="input-wrapper">
                            <input type="date" name="NgaySinh" id="birthdate" value="<?= $guide[0]->NgaySinh ?>" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <div class="input-wrapper">
                            <select name="GioiTinh" id="gender">
                                <option value="Nam" <?= ($guide[0]->GioiTinh === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                                <option value="Nữ" <?= ($guide[0]->GioiTinh !== 'Nam') ? 'selected' : ''; ?>>Nữ</option>
                            </select>
                        </div>
                    </div>

                    <div class="textarea-group">
                        <label for="description">Mô tả</label>
                        <div class="input-wrapper">
                            <textarea name="MoTa" id="description" required><?= $guide[0]->MoTa ?></textarea>
                        </div>
                    </div>

                    <div class="image-group">
                        <label for="avatar">Ảnh</label>
                        <div class="input-wrapper">
                            <img class="avatar-img" src="../Admin/public/img/guide/<?= $guide[0]->AnhHDV ?>" alt="ảnh hướng dẫn viên">
                            <input class="avatar-input" type="file" name="avatarUpdate" id="avatar">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá</label>
                        <div class="input-wrapper">
                            <input type="text" name="Gia" id="price" value="<?= $guide[0]->Gia ?>" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rating">Đánh giá</label>
                        <div class="input-wrapper">
                            <select id="rating" name="DanhGia">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <option value="<?= $i ?>" <?= ($guide[0]->DanhGia == $i) ? 'selected' : ''; ?>><?= $i ?> sao</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="submit" name="btn-update" class="insert">Cập nhật</button>
                        <a href="index.php?controller=guide&action=index"><button class="back" type="button">Quay về</button></a>
                    </div>
                </form>
        </div>
    </div>
</div>