<?php if(!isset($warning)):?>
    <div class="list-faculty">
        <div><h2>Chuyên khoa khám</h2></div>
        <div class="faculty">
            <?php foreach($data as $faculty):?>
                <div class="sub-faculty">
                    <a href="index.php?controller=list&action=index&id=<?php echo $faculty['MaKhoa']?>"><img id="img-faculty" src="./Admin/public/img/service/<?php echo $faculty['HinhAnh']?>" alt="anh">
                    <span id="name-faculty"><?php echo $faculty['TenKhoa'];?></span></a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?php endif;?>

<?php if(isset($warning)):?>
    <div class="message">
        <h2><?php echo $warning?></h2>
    </div>
<?php endif;?>