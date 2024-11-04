<?php if($_REQUEST['controller'] === 'calendarContent' && $_REQUEST['action'] === 'booking'):?>
    <?php echo '<link rel="stylesheet" href="./public/css/message.css">';?>
    <div class="message">
        <input type="hidden" id="code"value="<?=$code?>">
        <h2><?=$title?></h2>
        <p><?=$message?></p>
        <p id="goHome">Về trang chủ sau <span id="countdown"></span>s</p>
        <br>
        <a id="goCalendar" href="<?=$href?>"><span id="calendar"><?=$messageAction?></span></a>
    </div>
<?php endif;?>