<div class="user">
    <div class=" form__update-tour">
        <div class="form__update-content">
            <h2>Thông tin tour</h2>
            <?php foreach($tour as $data):?>
                <form action="index.php?controller=tour&action=update&id=<?php echo $data['MaTour']?>" method="post" enctype="multipart/form-data">
                    <label for="name">Tên tour:</label>
                    <input id="name" name="TenTour" type="text" style="width: 400px; height: 30px; margin-left: 85px" value="<?php echo $data['TenTour']?>"><br>
                    <p id="anh">Ảnh tour:</p>
                    <img class="avata-img" src="../Admin/public/img/tour/<?php echo $data['AnhTour']?>" alt="ảnh tour" style="max-width: 400px; margin-left: 150px"><br>
                    <input class="avatar-input-update" type="file" name="input-file" style="margin-left: 150px"><br>
                    <label for="mota">Mô tả:</label>
                    <textarea name="MoTa" id="mota" cols="45" rows="10">
                        <?php echo $data['MoTa']?>
                    </textarea> <br>
                    <label for="gia">Giá:</label>
                    <input type="text" name="Gia" style="width: 200px; height: 30px; margin-left: 85px" value="<?php echo $data['Gia']?>"><br><br>
                    <button type="submit" name="update" class="update">Cập nhật</button>
                    <button name="insert" class="insert">
                        <a href="index.php?controller=tour&action=index">Quay về</a>
                    </button>
                </form>
            <?php endforeach;?>
        </div>
    </div>
</div>