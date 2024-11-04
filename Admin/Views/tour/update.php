<div class="tour">
    <div class="form-update">
        <div class="update-content">
            <h2>Sửa thông tin Tour</h2><br>
            <form action="index.php?controller=tour&action=update&id=<?=$tour[0]->MaTour?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id">Mã Tour:</label>
                    <div class="input-wrapper">
                        <input id="id" name="MaTour" type="text" disabled value="<?=$tour[0]->MaTour?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Tên Tour:</label>
                    <div class="input-wrapper">
                        <input id="name" name="TenTour" type="text" value="<?=$tour[0]->TenTour?>" required>
                    </div>
                </div>

                <div class="textarea-group">
                    <label for="gioithieu">Giới thiệu:</label>
                    <div class="input-wrapper">
                        <textarea name="GioiThieu" id="gioithieu" required><?=$tour[0]->GioiThieu?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tour">Chủ đề:</label>
                    <div class="input-wrapper">
                        <select id="tour" name="MaCD">
                                <?php foreach ($dataCD as $value):?> 
                                    <option value="<?=$value['id']?>" <?= $tour[0]->MaCD == $value['id'] ? 'selected' : ''?>><?=$value['name']?></option>
                                <?php endforeach; ?>
                            </option>
                        </select>
                    </div>
                </div>

                <div class="image-group">
                    <label>Ảnh Tour:</label>
                    <div class="input-wrapper">
                        <img class="avatar-img" src="../Admin/public/img/tour/<?=$tour[0]->AnhTour?>" alt="ảnh tour">
                        <input class="avatar-input" type="file" name="avatarUpdate">
                    </div>
                </div>

                <div class="textarea-group">
                    <label for="mota">Mô tả:</label>
                    <div class="input-wrapper">
                        <textarea name="MoTa" id="mota" required><?=$tour[0]->MoTa?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gia">Giá:</label>
                    <div class="input-wrapper">
                        <input type="text" id="gia" name="Gia" value="<?=$tour[0]->GiaTour?>" required>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" name="btn-update" class="update">Cập nhật</button>
                    <a href="index.php?controller=tour&action=index"><button type="button">Quay về</button></a>
                </div>
            </form>
        </div>
    </div>
</div>