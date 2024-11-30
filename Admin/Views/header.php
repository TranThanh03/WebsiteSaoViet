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
        <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

        <?php
            if(isset($_REQUEST['controller'])) {
                if($_REQUEST['controller'] === 'home') {
                    echo '<script>sessionStorage.setItem("navIndex", 0)</script>';
                }
                else if($_REQUEST['controller'] === 'calendar' && $_REQUEST['action'] === 'detail') {
                    echo '<link rel="stylesheet" href="./public/css/calendar.css"/>';
                }
                else if($_REQUEST['controller'] === 'user' || $_REQUEST['controller'] === 'task') {
                    echo '<link rel="stylesheet" href="./public/css/showFormInsert.css"/>';
                    echo '<script src="./public/js/showFormInsert.js"></script>';
                } 
                else if($_REQUEST['controller'] === 'tour' && $_REQUEST['action'] === 'create') {
                    echo '<link rel="stylesheet" href="./public/css/createTour.css"/>';
                }
                else if($_REQUEST['controller'] === 'tour' && $_REQUEST['action'] === 'showForm') {
                    echo '<link rel="stylesheet" href="./public/css/updateTour.css"/>';
                }
                else if($_REQUEST['controller'] === 'guide' && $_REQUEST['action'] === 'create') {
                    echo '<link rel="stylesheet" href="./public/css/createGuide.css"/>';
                }
                else if($_REQUEST['controller'] === 'guide' && $_REQUEST['action'] === 'showForm') {
                    echo '<link rel="stylesheet" href="./public/css/updateGuide.css"/>';
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
                    <li><a href="index.php?controller=calendar&action=index">Đơn đặt</a></li>
                </ul>
            </nav>
        </header>
    </div>
