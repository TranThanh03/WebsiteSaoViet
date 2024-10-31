<?php
    class Task {
        public $MaPC;
        public $MaTour;
        public $MaHDV;
        public $NgayKH;
        public $NgayKT;
        public $TrangThai;

        public function __construct($MaPC, $MaTour, $MaHDV, $NgayKH, $NgayKT, $TrangThai) {
            $this->MaPC = $MaPC;
            $this->MaTour = $MaTour;
            $this->MaHDV = $MaHDV;
            $this->NgayKH = $NgayKH;
            $this->NgayKT = $NgayKT;
            $this->TrangThai = $TrangThai;
        }
    }
?>