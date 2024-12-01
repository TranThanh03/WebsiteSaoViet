<?php
    class Calendar {
        public $MaDD;
        public $MaKH;
        public $MaTour;
        public $MaHDV;
        public $TongTien;
        public $ThoiGianDat;
        public $TrangThai;

        public function __construct($MaDD, $MaKH, $MaTour, $MaHDV, $TongTien, $ThoiGianDat, $TrangThai) {
            $this->MaDD = $MaDD;
            $this->MaKH = $MaKH;
            $this->MaTour = $MaTour;
            $this->MaHDV = $MaHDV;
            $this->TongTien = $TongTien;
            $this->ThoiGianDat = $ThoiGianDat;
            $this->TrangThai = $TrangThai;
        }
    }
?>