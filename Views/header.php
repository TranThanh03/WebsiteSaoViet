<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sao Việt Traveloka - Vivu ba miền</title>
    <link rel="icon" href="./public/img/logo.jpg" type="image/jpg">


    <?php if ((isset($_REQUEST['controller']) && $_REQUEST['controller'] !== 'news') || !isset($_REQUEST['controller'])) : ?>
        <link rel="stylesheet" href="./public/css/trangChu.css">
        <link rel="stylesheet" href="./public/css/dsKhoa.css">
    <?php endif; ?>

    <?php if (isset($_REQUEST['controller']) && $_REQUEST['controller'] === 'news') : ?>
        <link rel="stylesheet" href="./public/css/styleDNvaTinTuc.css">
        <link rel="stylesheet" href="./public/css/styleCtttTuyenDung.css">
        <link rel="stylesheet" href="./public/css/trangChu.css">
        <link rel="stylesheet" href="./public/css/st.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php endif; ?>

    <?php if (isset($_REQUEST['controller']) && $_REQUEST['controller'] === 'doctor') : ?>
        <?php if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'index') : ?>
            <link rel="stylesheet" href="./public/css/dsBacSi.css">
        <?php endif; ?>

        <?php if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'detail') : ?>
            <link rel="stylesheet" href="./public/css/chiTietBS.css">
        <?php endif; ?>
    <?php endif; ?>
    <?php if (isset($_REQUEST['controller']) && $_REQUEST['controller'] === 'list') : ?>
        <link rel="stylesheet" href="./public/css/dsKhoaBacSi.css">
    <?php endif; ?>
    <link rel="stylesheet" href="./public/css/datLich.css">
    <link rel="stylesheet" href="./public/css/thongbao.css">
    <script>
        function submitForm(event) {
            // Ngăn chặn hành động mặc định của form
            event.preventDefault();

            // Lấy form và gửi nó đi
            document.getElementById("search_form").submit();
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    submitForm(event);
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="./public/img/logo.jpg" alt="logo">
                <p>Sao Việt</p>
            </div>
            <div class="search">
                <div class="sub-search">
                    <form id="search_form" action="index.php?controller=faculty&action=search" method="post">
                        <input type="text" placeholder="Tìm kiếm tours" name="search_tenkhoa">
                        <span><img src="./public/icons/search.svg" alt="icon"></span>
                    </form>
                </div>
            </div>
            <div class="content-right">
                <div class="icon-calendar">
                    <img src="./public/icons/clock-regular.svg" alt="icon">
                    <p>Lịch hẹn</p>
                    <span id="notification-calendar"></span>
                </div>
                <div class="icon-account">
                    <a href=" 
                        <?php
                        if (isset($_SESSION['sdt'])) {
                            echo "index.php?controller=user&action=logout";
                        } else {
                            echo "index.php?controller=user&action=index";
                        }
                        ?> ">
                        <img src="./public/icons/user-regular.svg" alt="icon"></i>
                        <p>
                            <?php
                            if (isset($_SESSION['sdt'])) {
                                echo "Đăng xuất";
                            } else {
                                echo "Đăng nhập";
                            }
                            ?>
                        </p>
                    </a>
                </div>
            </div>
        </div>

        <nav>
            <ul class="menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?controller=faculty&action=index">Tours</a></li>
                <li><a href="index.php?controller=doctor&action=index">Khách sạn</a></li>
                <li><a href="index.php?controller=faculty&action=index">Khuyến mãi</a></li>
                <li><a href="index.php?controller=news&action=index">Tin tức</a></li>
            </ul>
        </nav>
    </header>
    <?php if (!isset($_REQUEST['controller']) || $_REQUEST['controller'] === 'home') : ?>
        <div class="space"></div>
    <?php endif; ?>