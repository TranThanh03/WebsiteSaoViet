<?php
    class Calendar {
        public $MaDD;
        public $MaKH;
        public $MaTour;
        public $MaHDV;
        public $MaPC;
        public $TongTien;
        public $ThoiGianDat;
        public $TrangThai;

        public function __construct($MaDD, $MaKH, $MaTour, $MaHDV, $MaPC, $TongTien, $ThoiGianDat, $TrangThai) {
            $this->MaDD = $MaDD;
            $this->MaKH = $MaKH;
            $this->MaTour = $MaTour;
            $this->MaHDV = $MaHDV;
            $this->MaPC = $MaPC;
            $this->TongTien = $TongTien;
            $this->ThoiGianDat = $ThoiGianDat;
            $this->TrangThai = $TrangThai;
        }
    }
?>