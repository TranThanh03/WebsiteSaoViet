<div class="main">
    <div class="insert-guide">
        <div class="form__insert-content">
            <h2>Thêm hướng dẫn viên</h2>
            <form action="index.php?controller=guide&action=insert" method="post" enctype="multipart/form-data">
            <label for="name">Tên hướng dẫn viên</label>
                <input type="text" name="TenHDV" id="name"/> <br>
                <label for="name">Số điện thoại</label>
                <input type="text" name="SDT" id="name"/><br>
                <label for="name">Email</label>
                <input type="text" name="Email" id="name"/><br>
                <label for="name">Ngày sinh</label>
                <input type="date" name="NgaySinh" id="name"/><br>
                <label for="name">Giới tính</label>
                <select  name="GioiTinh">
                    <option value="Nam" selected>Nam</option>
                    <option value="Nữ">Nữ</option>
                </select> <br>
                <label for="tour">Tours</label>
                <select id="tour" name="MaTour">
                    <option value="0" selected>-----List Tour-----</option>;
                    <?php foreach($dataTour as $value):?>
                        <option value="<?=$value['MaTour']?>">Mã tour <?=$value['MaTour']?>: <?=$value['TenTour']?></option>
                    <?php endforeach;?>
                </select> <br>
                <label for="mota">Mô tả</label>
                <textarea name="MoTa" id="mota" cols="45" rows="10"></textarea> <br>
                <label for="avatar">Ảnh</label>
                <input class="avatar-input-update" type="file" name="avatar" id="anh" ><br>
                <img class="avata-img" alt="ảnh"
                    style="width: 200px; margin-left: 155px;"> <br>
                <label for="gia">Giá</label>
                <input type="text" name="Gia" id="gia"/><br>
                <label for="danhgia">Đánh giá</label>
                <select id="tour" name="DanhGia">
                    <?php for($i=1; $i<=5; $i++):?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php endfor;?>
                </select><br>
                <button type="submit" name="insert" class="insert">Thêm</button>
                <button type="submit" name="insert" class="insert">
                    <a href="index.php?controller=guide&action=index">Quay về</a>
                </button>
            </form>
            <br><br>
        </div>
    </div>
</div>
    