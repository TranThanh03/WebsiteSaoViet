<?php
    class User {
        public $MaKH;
        public $TenKH;
        public $Email;
        public $MaTK;
        public function __construct($MaKH, $TenKH, $Email, $MaTK) {
            $this->MaKH = $MaKH;
            $this->TenKH = $TenKH;
            $this->Email = $Email;
            $this->MaTK = $MaTK;
        }
    }

?>