<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Đăng ký</title>
</head>
<body style="background: url('./public/img/background.jpg') no-repeat; background-size: over;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100 box-area0" style="font-family:'Segoe UI';">
        <div class="row border rounded-5 p-3 bg-while shadow box-area1" style="background-color: white;">
            <h1 class="text-center " >Đăng ký tài khoản</h1>
            <form action="index.php?controller=user&action=createAccount" method="post">
              <div class="form-floating mb-1 mt-1">
                <input type="text" class="form-control" id="email" placeholder="Họ và tên" name="full-name" value="<?php echo isset($_POST['full-name']) ? htmlspecialchars($_POST['full-name']) : ''; ?>">
                <label for="name">Họ và tên</label>
              </div>
              <div class="form-floating  mb-1 mt-1">
                <input type="text" class="form-control" id="phone" placeholder="Enter password" name="number-phone" value="<?php echo isset($_POST['number-phone']) ? htmlspecialchars($_POST['number-phone']) : ''; ?>">
                <label for="telephone">Số điện thoại</label>
              </div>
              <div class="form-floating mb-1 mt-1">
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <label for="email">Email</label>
              </div>
              <div class="form-floating mb-1 mt-1">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                <label for="pwd">Mật khẩu</label>
              </div>
              <div class="form-floating mb-1 mt-1 ml-3">
                <input type="password" class="form-control" id="email" placeholder="Enter email" name="repeatpw" value="<?php echo isset($_POST['repeatpw']) ? htmlspecialchars($_POST['repeatpw']) : ''; ?>">
                <label for="pwd" class="form-floating">Nhập lại mật khẩu</label>
              </div>
              <div>
                <?php 
                  if(!empty($warning)) {
                    echo "<p style='color: red; padding-top:4px;'>{$warning}</p>";
                  }
                ?>
                <button type="submit" class="btn btn-lg btn-primary w-100 fs-6" >Đăng ký</button>
                <p>Bằng việc đăng ký tài khoản bạn đã đồng ý với <a href="#">Điều khoản sử dụng</a> của chúng tôi!</p>
                <p>Bạn đã có tài khoản? <a href="index.php?controller=user&action=index">Đăng nhập</a> </p>
              </div>
            </form>
          </div>
        </div>
    </div>
</body>
</html>