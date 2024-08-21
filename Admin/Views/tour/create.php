<div class="user">
    <div class=" form__insert-tour">
        <div class="form__insert-content">
            <h2>Thêm tour</h2>
            <form action="index.php?controller=tour&action=insert" method="post" enctype="multipart/form-data">
                    <label for="name">Tên tour:</label>
                    <input id="name" name="TenTour" type="text" style="width: 400px; height: 30px;"><br>
                    <p id="anh">Ảnh tour:</p>
                    <img class="avata-img" alt="ảnh tour" style="max-width: 400px; margin-left: 150px"><br>
                    <input class="avatar-input-update" type="file" name="input-file" style="margin-left: 150px"><br>
                    <label for="mota">Mô tả:</label>
                    <textarea name="MoTa" id="mota" cols="45" rows="10"></textarea> <br>
                    <label for="gia">Giá:</label>
                    <input type="text" name="Gia" style="width: 200px; height: 30px;"><br><br> 
                    <button type="submit" name="insert" class="insert">Thêm</button>
                    <button type="submit" name="insert" class="insert">
                        <a href="index.php?controller=tour&action=index">Quay về</a>
                    </button>
            </form>
        </div>
    </div>
</div>