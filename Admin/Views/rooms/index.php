<div class="user">
    <button class="service-Insert__btn"><a href="#">Thêm phòng khám</a></button>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên phòng</th>
                <th>Khoa</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;?>
            <?php foreach($data as $value):?>
                <?php $i++;?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['TenPhongKham']?></td>
                <td><?php echo $value['TenKhoa']?></td>
                <td>
                    <button><a href="index.php?controller=room&action=delete&id=<?php echo $value['MaPhongKham']?>" style="color: red;">Xóa</a></button>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

</div>
</div>
<div class="form__insert form__insert-service">
    <div class="form__insert-content">
        <h2>Thêm khoa</h2>
        <button class="close-btn close-btn__service">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <form action="index.php?controller=room&action=insert&table=phongkham" method="post">
            <label for="name">Tên phòng khám</label>
            <input type="text" name="TenPhongKham" id="name" /> <br />
            <label for="">Khoa</label>
            <select name="MaKhoa">
                <option value="">-----Khoa-----</option>
                    <?php foreach($services as $value): ?>
                        <option value="<?php echo $value['MaKhoa']?>"><?php echo $value['TenKhoa']?></option>
                    <?php endforeach;?>
            </select><br>
            <button type="submit" name="insert" class="insert">
                Thêm
            </button>
        </form>
    </div>
</div>