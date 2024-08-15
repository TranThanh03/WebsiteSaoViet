<div class="user">

    <div id="wrapper">
        <form action="index.php?controller=auth&action=login" id="form-login" method="post">
            <h1 class="form-heading">Đăng Nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" name="accountAdmin" class="form-input" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" name="passwordAdmin" class="form-input" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        <?php
            if(!empty($warning['0'])) {
                echo "<p style='color: red; padding-top:4px;'>{$warning}</p>";
            }
        ?>
        </form>

    </div>
</div>