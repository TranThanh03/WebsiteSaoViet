<?php
    class Account {
        public $MaTK;
        public $SDT;
        public $MatKhau;
        public $Quyen;
        public function __construct($MaTK, $SDT, $MatKhau, $Quyen)
        {
            $this->MaTK = $MaTK;
            $this->SDT = $SDT;
            $this->MatKhau = $MatKhau;
            $this->Quyen = $Quyen;
        }
    }
?>