<div class="user">
    <div class=" form__insert-service">
        <div class="form__insert-content">
            <h2>Thêm khoa</h2>
            <form action="index.php?controller=service&action=insert&table=khachhang" method="post" enctype="multipart/form-data">
                <label for="name">Tên kkhoa</label>
                <input type="text" name="TenKhoa" id="name" /> <br />
                <label for="avatar">Ảnh</label>
                <input type="file" name="avatar" id=""> <br>
                <label for="">Mô tả</label>
                <textarea name="MoTa" id="" cols="45" rows="10"></textarea> <br>
                <button type="submit" name="insert" class="insert">
                    <a href="index.php?controller=service&action=index">Quay về</a>
                    
                </button>
                <button type="submit" name="insert" class="insert">
                    Thêm
                </button>
            </form>
        </div>
    </div>
</div>