<div class="notifi">
    <div class="title">
        <input type="hidden" id="code" value="<?=$code ?? ''?>">
        <p id="message"><?=$message ?? ''?></p>
    </div>
    <div class="content">
        <p id="countdown"></p>
    </div>
</div>

<div class="tour-form">
    <div class="form-container">
        <div class="form-content">
            <h2>Thêm Tour</h2>
            <form action="index.php?controller=tour&action=create" method="post" enctype="multipart/form-data" class="tour-insert-form">
                <div class="form-group">
                    <label for="tourName">Tên Tour:</label>
                    <input id="tourName" name="TenTour" type="text" required value="<?=$_POST['TenTour'] ?? ""?>">
                </div>

                <div class="form-group">
                    <label for="introduction">Giới thiệu:</label>
                    <textarea id="GioiThieu" name="GioiThieu" rows="5"><?=$_POST['GioiThieu'] ?? ""?></textarea>
                </div>

                <div class="form-group">
                    <label for="tourCategory">Chủ đề:</label>
                    <select id="tourCategory" name="MaCD" required>
                        <option value="">--Chọn chủ đề--</option>
                        <?php foreach($dataCD as $value):?>
                            <option value="<?=$value['id']?>" <?= isset($_POST['MaCD']) && $_POST['MaCD'] == $value['id'] ? 'selected' : ''?>><?=$value['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tourImage">Ảnh Tour:</label>
                    <div class="image-upload">
                        <img id="imagePreview" src="./public/img/no-image.png" alt="Ảnh tour" class="avatar-img">
                        <input type="file" id="tourImage" name="avatar-input" class="avatar-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea id="MoTa" name="MoTa" rows="5" required><?=$_POST['MoTa'] ?? ""?></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Giá:</label>
                    <input id="price" name="Gia" type="text" min="0" required value="<?=$_POST['Gia'] ?? ""?>">
                </div>

                <div class="button-group">
                    <a href="index.php?controller=tour&action=index" class="btn btn-secondary">Quay về</a>
                    <button type="submit" name="btn-insert" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace("GioiThieu");
    CKEDITOR.replace("MoTa");
</script>
