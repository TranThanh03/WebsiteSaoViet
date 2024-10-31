<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sao Việt - Vivu ba miền</title>
        <link rel="icon" href="./public/img/logo.jpg" type="image/jpg">
        <link rel="stylesheet" href="./public/css/home.css">
        <link rel="stylesheet" href="./public/css/notifi.css">
        
        <script src="./public/js/onChangeAvatar.js"></script>
        <script src="./public/js/general.js"></script>
        <script src="./public/js/notifi.js"></script>

        <!--ckeditor-->
        <script src="./ckeditor/ckeditor.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace("GioiThieu");
            CKEDITOR.replace("MoTa");
        </script>
        
        <?php
            if(isset($_REQUEST['controller'])) {
                if($_REQUEST['controller'] === 'home') {
                    echo '<script>sessionStorage.setItem("navIndex", 0)</script>';
                }
                else if($_REQUEST['controller'] === 'appointment' && $_REQUEST['action'] === 'detail') {
                    echo '<link rel="stylesheet" href="./public/css/appointment.css"/>';
                }
                else if($_REQUEST['controller'] === 'task') {
                    echo '<link rel="stylesheet" href="./public/css/task.css"/>';
                }
                
            }
        ?>   
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
                    </div>
                </div>
                <div class="content-right">
                    <div class="icon-account">
                        <a href="index.php?controller=auth&action=logout">
                            <img src="./public/icons/user-regular.svg" alt="icon"></i>
                            <p>Đăng xuất</p>
                        </a>
                    </div>
                </div>
            </div>

            <nav>
                <ul class="menu">
                    <li><a href="index.php?controller=home&action=index">Trang chủ</a></li>
                    <li><a href="index.php?controller=user&action=index">Khách hàng</a></li>
                    <li><a href="index.php?controller=tour&action=index">Tours</a></li>
                    <li><a href="index.php?controller=guide&action=index">Hướng dẫn viên</a></li>
                    <li><a href="index.php?controller=task&action=index">Phân công</a></li>
                    <li><a href="index.php?controller=appointment&action=index">Lịch đặt</a></li>
                </ul>
            </nav>
        </header>
    </div>