<?php 
    class NewsController extends BaseController {
        public function index() {
            return $this->view("newsPage");
        }

        public function chitietCNTT() {
            return $this->view("CtttTuyenDungCNTT");
        }
        public function chitietdieuduong() {
            return $this->view("CtttTuyenDungDieuDuong");
        }
    }
?>