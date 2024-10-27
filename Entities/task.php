<?php
    class Task {
        public $MaPC;
        public $MaTour;
        public $MaHDV;
        public $NgayKH;
        public $NgayKT;

        public function __construct($MaPC, $MaTour, $MaHDV, $NgayKH, $NgayKT) {
            $this->MaPC = $MaPC;
            $this->MaTour = $MaTour;
            $this->MaHDV = $MaHDV;
            $this->NgayKH = $NgayKH;
            $this->NgayKT = $NgayKT;
        }
    }
?>