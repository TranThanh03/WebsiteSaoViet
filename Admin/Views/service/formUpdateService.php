<div class="user">
    <div class=" form__insert-service">
        <div class="form__insert-content">
            <h2>Thông tin khoa</h2>
            <?php foreach($services as $data):?>
                <form method="post" enctype="multipart/form-data">
                    <label for="name">Tên kkhoa</label>
                    <p><?php echo $data['TenKhoa']?></p> <br />
                    <label for="">Mô tả</label>
                    <textarea name="MoTa" id="" cols="45" rows="10">
                        <?php echo $data['GioiThieu']?>
                    </textarea> <br>
                    <button name="insert" class="insert">
                        <a href="index.php?controller=service&action=index">Quay về</a>
                    </button>
                </form>
            <?php endforeach;?>
        </div>
    </div>
</div>