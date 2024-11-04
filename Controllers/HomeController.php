<?php
    class HomeController extends BaseController {
        public $tourModel;
        public $guideModel;

        public function __construct() {
            $this->model('tourModel');
            $this->tourModel = new TourModel();

            $this->model('guideModel');
            $this->guideModel = new GuideModel();
        }
        public function index() {
            $tours = $this->tourModel->getAll();
            $guides = $this->guideModel->getGuide(['MaHDV', 'TenHDV', 'AnhHDV', 'NgaySinh'], 'DanhGia', '5');
            return $this->view("home.index",
                [
                    'tours' => $tours,
                    'guides' => $guides    
                ],
            );
        }
    }
?>