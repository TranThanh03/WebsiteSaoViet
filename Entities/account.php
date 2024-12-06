<?php
    class Account {
        public $MaTK;
        public $SDT;
        public $Email;
        public $MatKhau;
        public $Quyen;
        public function __construct($MaTK, $SDT, $Email, $MatKhau, $Quyen)
        {
            $this->MaTK = $MaTK;
            $this->SDT = $SDT;
            $this->Email = $Email;
            $this->MatKhau = $MatKhau;
            $this->Quyen = $Quyen;
        }
    }
?>