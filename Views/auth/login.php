<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />
        <title>Đăng nhập</title>
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row border rounded-5 p-3 bg-while shadow box-area">
                <div
                    class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                    style="background: #1087be"
                >
                <div class="featured-image mb-3">
                    <img src="./public/img/logo.jpg" class="img-fluid" style="width:280px; height: 200px; border-radius: 10px;">
                </div>
                    <p
                        class="text-white fs-2"
                        style="
                            font-family: 'Segoe UI', Courier,
                                monospace;
                            font-weight: 600;
                        "
                    >
                        Sao Việt
                    </p>
                    <small
                        class="text-white text-wrap text-center fs-4"
                        style="
                            width: 20rem;
                            font-family: 'Segoe UI';
                        "
                    >
                        Uy tín tạo nên sự tin tưởng</small
                    >
                </div>

                <div class="col-md-6 right-box d-flex">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Xin chào</h2>
                            <p>Chúng tôi rất vui vì bạn đã trở lại!</p>
                        </div>
                        <form action="index.php?controller=auth&action=login" method="post">
                            <div
                                class="input-group mb-3"
                                style="font-family: 'Segoe UI'; display: block;"
                            >
                                <p><b>Tài khoản</b></p>
                                <input
                                    type="text"
                                    class="form-control form-control-lg bg-light fs-6"
                                    style="width: 100%; border-radius: 8px;"
                                    placeholder="SĐT hoặc Email"
                                    name="username"
                                    value="<?=isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                                />
                            </div>
                            <div
                                class="input-group mb-1"
                                style="font-family: 'Segoe UI'; display: block;"
                            >
                                <p><b>Mật khẩu</b></p>
                                <input
                                    type="password"
                                    class="form-control form-control-lg bg-light fs-6"
                                    style="width: 100%; border-radius: 8px;"
                                    placeholder="******"
                                    name="password"
                                    value="<?=isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>"
                                />
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">
                                    Đăng nhập
                                </button>
                            </div>
                        </form>
                        <div>
                            <p style="color: red; padding-top:4px;"><?=$warning ?? ''?></p>
                        </div>
                        <div
                            class="input-group mb-2 .bg-warning d-flex fs-5 justify-content-between"
                            style="font-family: 'Segoe UI'"
                        >
                            <div class="d-flex">
                                <div class="register">
                                    <small>
                                        Khách hàng mới?
                                        <a href="index.php?controller=auth&action=register">Tạo tài khoản mới</a>
                                    </small>
                                </div>
                            </div>
                            <div class="back">
                                <small>
                                    <a href="index.php?controller=home&action=index" style="text-decoration: none;" >Quay về</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
