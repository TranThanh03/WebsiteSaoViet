<div class="form">
    <div class="form_appointment">
        <h2>Duyệt đơn đặt lịch</h2>
        <table>
            <tr>
                <td>Mã lịch đặt: <?php echo $data[0]['MaLD']?></td>
                <td></td>
                <td></td>
                <td>Mã khách hàng: <?php echo $data[0]['MaKH']?></td>
            </tr>
            <tr>
                <td>Thời gian đặt lịch: <?php echo $data[0]['ThoiGian']?></td>
                <td></td>
                <td></td>
                <td>Tên khách hàng: <?php echo $data[0]['TenKH']?></td>
            </tr>
            <tr>
                <td>Trạn thái: <?php echo $data[0]['TrangThai']?></td>
                <td></td>
                <td></td>
                <td>SDT: <?php echo $data[0]['SDT']?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Email: <?php echo $data[0]['Email']?></td>
            </tr>
            <tr>
                <td colspan="4"><hr></td>
            </tr>
        </table>
            <?php if($value['id_TrangThai'] === '1'):?>
                <button><a href="index.php?controller=appointment&action=update&status=confirm">Xác nhận</a></button>
                <button><a href="index.php?controller=appointment&action=update&status=noConfirm" style="color: red;">Hủy</a></button>
            <?php endif;?>
    </div>
</div>
