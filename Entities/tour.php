<?php
    class Tour {
        public $MaTour;
        public $TenTour;
        public $AnhTour;
        public $GioiThieu;
        public $MoTa;
        public $GiaTour;
        public $MaCD;
        
        public function __construct($MaTour, $TenTour, $AnhTour, $GioiThieu, $MoTa, $GiaTour, $MaCD) {
            $this->MaTour = $MaTour;
            $this->TenTour = $TenTour;
            $this->AnhTour = $AnhTour;
            $this->GioiThieu = $GioiThieu;
            $this->MoTa = $MoTa;
            $this->GiaTour = $GiaTour;
            $this->MaCD = $MaCD;
        }
    }
?>