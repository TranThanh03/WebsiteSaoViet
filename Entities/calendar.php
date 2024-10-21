<?php
    class Calendar {
        public $MaLD;
        public $MaKH;
        public $MaTour;
        public $MaHDV;
        public $TongTien;
        public $ThoiGianDat;
        public $TrangThai;

        public function __construct($MaLD, $MaKH, $MaTour, $MaHDV, $TongTien, $ThoiGianDat, $TrangThai) {
            $this->MaLD = $MaLD;
            $this->MaKH = $MaKH;
            $this->MaTour = $MaTour;
            $this->MaHDV = $MaHDV;
            $this->TongTien = $TongTien;
            $this->ThoiGianDat = $ThoiGianDat;
            $this->TrangThai = $TrangThai;
        }
    }
?>