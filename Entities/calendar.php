<?php
    class Calendar {
        public $MaDD;
        public $MaKH;
        public $TenKH;
        public $MaTour;
        public $MaHDV;
        public $MaPC;
        public $NgayKH;
        public $NgayKT;
        public $GiaTour;
        public $GiaHDV;
        public $TongTien;
        public $ThoiGianDat;
        public $TrangThai;

        public function __construct($MaDD, $MaKH, $TenKH, $MaTour, $MaHDV, $MaPC, $NgayKH, $NgayKT, $GiaTour, $GiaHDV, $TongTien, $ThoiGianDat, $TrangThai) {
            $this->MaDD = $MaDD;
            $this->MaKH = $MaKH;
            $this->TenKH = $TenKH;
            $this->MaTour = $MaTour;
            $this->MaHDV = $MaHDV;
            $this->MaPC = $MaPC;
            $this->NgayKH = $NgayKH;
            $this->NgayKT = $NgayKT;
            $this->GiaTour = $GiaTour;
            $this->GiaHDV = $GiaHDV;
            $this->TongTien = $TongTien;
            $this->ThoiGianDat = $ThoiGianDat;
            $this->TrangThai = $TrangThai;
        }
    }
?>