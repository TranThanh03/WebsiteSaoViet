<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sao Việt - Vivu ba miền</title>
    <link rel="icon" href="./public/img/logo.jpg" type="image/jpg">
    <link rel="stylesheet" href="./public/css/home.css">
    
    <?php
        if(isset($_REQUEST['controller'])) {
            if($_REQUEST['controller'] === 'home') {
                echo '<script src="./public/js/home.js"></script>';
            }
            else if($_REQUEST['controller'] === 'news') {
                echo '<link rel="stylesheet" href="./public/css/news.css">';
                echo '<link rel="stylesheet" href="./public/css/newsDetail.css">';
            }      
            else if($_REQUEST['controller'] === 'hotel') {
                echo '<link rel="stylesheet" href="./public/css/hotel.css">';
                echo '<link rel="stylesheet" href="./public/css/hotelDetail.css">';
            }
            else if($_REQUEST['controller'] === 'tour') {
                if($_REQUEST['action'] === 'list' || $_REQUEST['action'] === 'search') {
                    echo '<link rel="stylesheet" href="./public/css/listTour.css">';
                } 
                else {
                    echo '<link rel="stylesheet" href="./public/css/tour.css">';
                    echo '<link rel="stylesheet" href="./public/css/tourDetail.css">';
                }
            }
            else if($_REQUEST['controller'] === 'guide') {
                echo '<link rel="stylesheet" href="./public/css/guide.css">';
                echo '<link rel="stylesheet" href="./public/css/guideDetail.css">';
                echo '<script src="./public/js/reviews.js"></script>';
            }
            else if($_REQUEST['controller'] === 'calendarContent' && $_REQUEST['action'] === 'index') {
                echo '<link rel="stylesheet" href="./public/css/calendarContent.css">';
                echo '<script src="./public/js/appointment.js"></script>';
            }
            else if($_REQUEST['controller'] === 'calendar') {
                echo '<link rel="stylesheet" href="./public/css/calendar.css">';
                echo '<script src="./public/js/calendar.js"></script>';
            }
        }
        else {
            echo '<script src="./public/js/home.js"></script>';
        }
    ?>
    <script src="./public/js/general.js"></script>
    <?php
        if(!isset($_SESSION['username'])) {
            echo "<script>sessionStorage.removeItem('statusCalendar');</script>";
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
                    <form id="search_form" action="index.php?controller=tour&action=search" method="post">
                        <input type="text" placeholder="Tìm kiếm Tours" name="search_tour" value="<?php echo isset($_POST['search_tour']) ? htmlspecialchars($_POST['search_tour']) : ''; ?>">
                        <button type="submit"><img src="./public/icons/search.svg" alt="icon"></button>
                    </form>
                </div>
            </div>
            <div class="content-right">
                <div class="icon-calendar">
                    <a href="index.php?controller=calendar&action=index">
                        <img src="./public/icons/clock-regular.svg" alt="icon">
                        <p>Lịch đặt</p>
                        <span id="notification-calendar">.</span>
                    </a>
                </div>
                <div class="icon-account">
                    <a href=" 
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "index.php?controller=user&action=logout";
                        } else {
                            echo "index.php?controller=user&action=index";
                        }
                        ?> ">
                        <img src="./public/icons/user-regular.svg" alt="icon"></i>
                        <p>
                            <?php
                            if (isset($_SESSION['username'])) {
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
                <li><a href="index.php">🏠Trang chủ</a></li>
                <li><a href="index.php?controller=tour&action=index">✈️Tours</a></li>
                <li><a href="index.php?controller=guide&action=index">🧑‍💼Hướng dẫn viên</a></li>
                <li><a href="index.php?controller=hotel&action=index">🏩Khách sạn</a></li>
                <li><a href="index.php?controller=news&action=index">📰Tin tức</a></li>
            </ul>
        </nav>
    </header>
    <?php if (!isset($_REQUEST['controller']) || $_REQUEST['controller'] === 'home') : ?>
        <div class="space"></div>
    <?php endif; ?>
</div>