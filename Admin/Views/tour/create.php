<div class="user">
    <div class=" form__insert-tour">
        <div class="form__insert-content">
            <h2>Thêm Tour</h2><br>
            <form action="index.php?controller=tour&action=insert" method="post" enctype="multipart/form-data">
                    <label for="name">Tên Tour:</label>
                    <input id="name" name="TenTour" type="text" style="width: 400px; height: 30px;"><br><br>
                    <label for="name">Ngày khởi hành:</label>
                    <input id="name" name="NgayKH" type="date" style="width: 400px; height: 30px;"><br><br>
                    <label for="name">Ngày kết thúc:</label>
                    <input id="name" name="NgayKT" type="date" style="width: 400px; height: 30px;"><br><br>
                    <label for="gioithieu">Giới thiệu:</label>
                    <textarea name="GioiThieu" id="gioithieu" cols="45" rows="10"></textarea><br><br>
                    <label for="tour" id="anh">Chủ đề:</label>
                    <select id="tour" name="MaCD" style="height: 30px; width: 200px;">
                        <option value="1" selected>Tour Biển Đảo</option>
                        <option value="2" >Tour Văn Hóa Lịch Sử</option>
                        <option value="3" >Tour Nghỉ Dưỡng</option>
                        <option value="4" >Tour Mạo Hiểm</option>
                        <option value="5" >Tour Ẩm Thực</option>
                    </select> <br><br>
                    <p id="anh">Ảnh Tour:</p>
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
            <br><br>
        </div>
    </div>
</div>