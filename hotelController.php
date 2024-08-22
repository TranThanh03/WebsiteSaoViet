<?php 
    class HotelController extends BaseController {
        public function index() {
            return $this->view("hotel.index");
        }

        public function hotelDetail() {
            return $this->view("hotel.hoteldetail");
        }
    }