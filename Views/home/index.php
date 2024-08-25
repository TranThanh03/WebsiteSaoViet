<!-- slider -->
<div class="slide">
    <div class="sub-slide">
        <div class="item">
            <img src="./public/img/home/slide_1.jpg" alt="slide_1">
        </div>
        <div class="item">
            <img src="./public/img/home/slide_2.jpg" alt="slide_2">
        </div>
        <div class="item">
            <img src="./public/img/home/slide_3.jpg" alt="slide_3">
        </div>
        <div class="item">
            <img src="./public/img/home/slide_4.jpg" alt="slide_4">
        </div>
        <div class="item">
            <img src="./public/img/home/slide_5.jpg" alt="slide_5">
        </div>
    </div>
    <button class="control-prev" type="button">
        <span>&lt;</span>
    </button>
    <button class="control-next" type="button">
        <span>&gt;</span>
    </button>
</div>

<!-- list tour -->
<div class="list" id="tour-slide">
        <div class="title">
            <span>Tour xu hướng</span>
            <a href="index.php?controller=tour&action=list">
                <span>Xem thêm</span>
            </a>
        </div>
        <div class="container">
            <div class="content" id="tour">
                <?php foreach($dataTour as $tour):?>
                    <div class="sub-list" id="sub-tour">
                        <a href="index.php?controller=tour&action=detail&id=<?php echo $tour['MaTour']?>">
                            <img src="./Admin/public/img/tour/<?php echo $tour['AnhTour']?>" alt="anh tour" id="avatar-tour">
                            <h4 id="tour-name"><?php echo $tour['TenTour']?></h4>
                            <span id="tour-price"><?php echo $tour['Gia']?>VND</span>
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
            <button class="button-prev" type="button" id="tour-prev">
                <span>&lt;</span>
            </button>
            <button class="button-next" type="button" id="tour-next">
                <span>&gt;</span>
            </button>
        </div>
    </div>

<!-- list guide -->
<div class="list" id="guide-slide">
        <div class="title">
            <span>Hướng dẫn viên nổi bật</span>
            <a href="index.php?controller=guide&action=index">
                <span>Xem thêm</span>
            </a>
        </div>
        <div class="container">
            <div class="content" id="guide">
                <?php foreach($dataGuide as $guide):?>
                    <div class="sub-list" id="sub-guide">
                        <a href="index.php?controller=guide&action=detail&id=<?php echo $guide['MaHDV']?>">
                            <img id="avatar-guide" src="./Admin/public/img/guide/<?php echo $guide['AnhHDV']?>" alt="anh hdv">
                            <h4 id="guide-name"><?php echo $guide['TenHDV']?></h4>
                            <span id="guide-age">
                                <?php 
                                    $ngaySinh = new DateTime($guide['NgaySinh']);
                                    $ngayHienTai = new DateTime();
                                    $tuoi = $ngayHienTai->diff($ngaySinh)->y;
                                    
                                    echo $tuoi;
                                ?>
                                tuổi
                            </span>
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
            <button class="button-prev" type="button" id="gui-prev">
                <span>&lt;</span>
            </button>
            <button class="button-next" type="button" id="gui-next">
                <span>&gt;</span>
            </button>
        </div>
    </div>
<script>
    window.addEventListener("load", () => {
        const aElement = document.querySelector('.menu a');
        aElement.style.color = 'white';
        aElement.style.backgroundColor = '#45C3D2';
        if(sessionStorage.getItem("navStatus") != 0) {
            sessionStorage.setItem("navStatus", "0");
            location.reload();
        }
    })
</script>