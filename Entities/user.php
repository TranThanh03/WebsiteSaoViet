<?php
    class User {
        public $MaKH;
        public $TenKH;
        public $MaTK;
        public function __construct($MaKH, $TenKH, $MaTK) {
            $this->MaKH = $MaKH;
            $this->TenKH = $TenKH;
            $this->MaTK = $MaTK;
        }
    }

?>