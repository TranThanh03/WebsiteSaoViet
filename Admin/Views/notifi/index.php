<div class="notifi">
    <div class="title">
        <input type="hidden" id="code" value="<?=$_REQUEST['code'] ?? ''?>">
        <input type="hidden" id="code2" value="<?=$_REQUEST['code2'] ?? ''?>">
        <p id="message"><?=$_REQUEST['message'] ?? ''?></p>
    </div>
    <div class="content">
        <p id="countdown"></p>
    </div>
</div>