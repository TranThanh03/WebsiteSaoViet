<?php
    class Calendar {
        public $MaLD;
        public $MaKH;
        public $MaTour;
        public $MaHDV;
        public $MaPC;
        public $TongTien;
        public $ThoiGianDat;
        public $TrangThai;

        public function __construct($MaLD, $MaKH, $MaTour, $MaHDV, $MaPC, $TongTien, $ThoiGianDat, $TrangThai) {
            $this->MaLD = $MaLD;
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