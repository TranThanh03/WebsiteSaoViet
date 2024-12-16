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
        public $DanhGia;

        public function __construct($MaHDV, $TenHDV, $AnhHDV, $GioiTinh, $NgaySinh, $SDT, $Email, $MoTa, $DanhGia) {
            $this->MaHDV = $MaHDV;
            $this->TenHDV = $TenHDV;
            $this->AnhHDV = $AnhHDV;
            $this->GioiTinh = $GioiTinh;
            $this->NgaySinh = $NgaySinh;
            $this->SDT = $SDT;
            $this->Email = $Email;
            $this->MoTa = $MoTa;
            $this->DanhGia = $DanhGia;
        }
    }
?>