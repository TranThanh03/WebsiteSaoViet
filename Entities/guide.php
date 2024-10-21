<?php
    class Guide {
        public $MaHDV;
        public $TenHDV;
        public $AnhHDV;
        public $GioiTinh;
        public $NgaySinh;
        public $SDT;
        public $Email;
        public $MoTa;
        public $Gia;
        public $DanhGia;
        public $MaTour;
        public function __construct($MaHDV, $TenHDV, $AnhHDV, $GioiTinh, $NgaySinh, $SDt, $Email, $MoTa, $Gia, $DanhGia, $MaTour) {
            $this->MaHDV = $MaHDV;
            $this->TenHDV = $TenHDV;
            $this->AnhHDV = $AnhHDV;
            $this->GioiTinh = $GioiTinh;
            $this->NgaySinh = $NgaySinh;
        }
    }
?>