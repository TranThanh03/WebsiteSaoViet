

<!-- slider -->
<div class="slide">
    <div class="sub-slide">
        <div class="item">
            <img src="./public/img/slide_1.jpg" alt="slide_1">
        </div>
        <div class="item">
            <img src="./public/img/slide_2.png" alt="slide_2">
        </div>
        <div class="item">
            <img src="./public/img/slide_3.png" alt="slide_3">
        </div>
    </div>
    <button class="control-prev" type="button">
        <span>&lt;</span>
    </button>
    <button class="control-next" type="button">
        <span>&gt;</span>
    </button>
</div>

<!-- faculty list -->
<div class="list" id="faculty-slide">
    <div class="title">
        <span>Chuyên khoa</span>
        <a href="index.php?controller=faculty&action=index">
            <span>Xem thêm</span>
        </a>
    </div>
    <div class="container">
        
        <div class="content" id="faculty">
            <?php foreach($dataFaculty as $faculty):?>
                <div class="sub-list" id="sub-faculty">
                    <a href="index.php?controller=list&action=index&id=<?php echo $faculty['MaKhoa']?>">
                        <img src="./Admin/public/img/service/<?php echo $faculty['HinhAnh']?>" alt="anh" id="avatar-faculty">
                        <span id="name-faculty"><?php echo $faculty['TenKhoa']?></span>
                    </a>
                </div>
            <?php endforeach;?>
        </div>

        <button class="button-prev" type="button" id="fac-prev">
            <span>&lt;</span>
        </button>
        <button class="button-next" type="button" id="fac-next">
            <span>&gt;</span>
        </button>
    </div>
</div>

<!-- list doctor -->
<div class="list" id="doctor-slide">
    <div class="title">
        <span>Bác sĩ nổi bật</span>
        <a href="index.php?controller=doctor&action=index">
            <span>Xem thêm</span>
        </a>
    </div>
    <div class="container">
        <div class="content" id="doctor">

            <?php foreach($dataDoctor as $doctor):?>
                <div class="sub-list" id="sub-doctor">
                    <a href="index.php?controller=doctor&action=detail&id=<?php echo $doctor['MaBS']?>">
                        <img id="avatar-doctor" src="./Admin/public/img/doctor/<?php echo $doctor['anh']?>" alt="anh">
                        <h4 id="doctor-name"><?php echo $doctor['TenBS']?></h4>
                        <span id="faculty-name">Khoa <?php echo $doctor['TenKhoa']?></span>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
        <button class="button-prev" type="button" id="doc-prev">
            <span>&lt;</span>
        </button>
        <button class="button-next" type="button" id="doc-next">
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

        const subContents = document.querySelectorAll('.sub-content');
        localStorage.setItem('totalCalendar', subContents.length);
    })
</script>