<?php if(($_REQUEST['controller'] === 'calendar' && $_REQUEST['action'] === 'delete') || ($_REQUEST['controller'] === 'calendarContent' && $_REQUEST['action'] === 'booking')):?>
    <div class="message">
        <?php echo '<link rel="stylesheet" href="./public/css/message.css">';?>
        <h2><?php echo $title?></h2>

        <p><?php echo $message?></p>

        <p style="color: blue;">Về trang chủ sau <span id="countdown"></span>s</p>
        <a href="index.php"></a>
    </div>
<?php endif;?>

<script>
    let count = 3;
    const countDown = document.querySelector('.message #countdown');
    
    countDown.textContent = count;
    
    const interval = setInterval(() => {
        countDown.textContent = --count;
    }, 1000)

    function goHome() {
        const tagA =document.querySelector('.message a');
        tagA.click();
    }

    setTimeout(() => {
        goHome();
        clearInterval(interval);
    }, 3000);
</script>