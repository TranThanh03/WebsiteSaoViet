<?php
    class Tour {
        public $MaTour;
        public $TenTour;
        public $AnhTour;
        public $NgayKH;
        public $NgayKT;
        public $GioiThieu;
        public $MoTa;
        public $GiaTour;
        public $MaCD;
        public function __construct($MaTour, $TenTour, $AnhTour, $NgayKH, $NgayKT, $GioiThieu, $MoTa, $GiaTour, $MaCD) {
            $this->MaTour = $MaTour;
            $this->TenTour = $TenTour;
            $this->AnhTour = $AnhTour;
            $this->NgayKH = $NgayKH;
            $this->NgayKT = $NgayKT;
            $this->GioiThieu = $GioiThieu;
            $this->MoTa = $MoTa;
            $this->GiaTour = $GiaTour;
            $this->MaCD = $MaCD;
        }
    }
?>