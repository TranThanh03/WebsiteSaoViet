<div class="user-profile">
    <div class="avatar-container">
        <img src="./public/img/user/user-avatar.png" alt="Avatar" class="avatar">
    </div>
    <div class="user-details">
        <h2>Thông tin khách hàng</h2>
        <table>
            <tbody>
                <tr>
                    <td><p><strong>Mã khách hàng:</strong></p></td>
                    <td class="infor"><?=$user[0]->MaKH?></td>
                </tr>
                <tr>
                    <td><p><strong>Họ tên:</strong></p></td>
                    <td class="infor"><?=$user[0]->TenKH?></td>
                </tr>
                <tr>
                    <td><p><strong>Số điện thoại:</strong></p></td>
                    <td class="infor"><?=$user[0]->SDT?></td>
                </tr>
                <tr>
                    <td><p><strong>Email:</strong></p></td>
                    <td class="infor"><?=$user[0]->Email?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>