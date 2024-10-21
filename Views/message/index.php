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

<script>
    const code = document.querySelector('.message #code');
    if(code.value == 0) {
        let count = 3;
        const countDown = document.querySelector('.message #countdown');
        const goHome = document.querySelector('.message #goHome');
        
        goHome.style.display = "block";
        
        countDown.textContent = count;
        
        const interval = setInterval(() => {
            countDown.textContent = --count;
        }, 1000)

        setTimeout(() => {
            clearInterval(interval);
            window.location.href = "index.php";
        }, 3000);
    }
    else {
        const tagH2 = document.querySelector('.message h2');
        const goCalendar = document.querySelector('.message #goCalendar');

        tagH2.style.color = "red";
        goCalendar.style.display = "block";
    }
</script>