<?php 
    class HotelController extends BaseController {
        public function index() {
            return $this->view("hotel.index");
        }

        public function detail() {
            return $this->view("hotel.detail");
        }
    }