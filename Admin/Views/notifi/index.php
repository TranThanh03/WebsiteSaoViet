<div class="notifi">
    <div class="title">
        <input type="hidden" id="code" value="<?=isset($_REQUEST['code']) ? $_REQUEST['code'] : ''?>">
        <p id="message"><?=isset($_REQUEST['message']) ? $_REQUEST['message'] : ''?></p>
    </div>
    <div class="content">
        <p id="countdown"></p>
    </div>
</div>