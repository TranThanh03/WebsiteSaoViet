<?php
    class HomeController extends BaseController {
        public $tourModel;
        public $guideModel;

        public function __construct() {
            $this->model('TourModel');
            $this->tourModel = new TourModel();

            $this->model('GuideModel');
            $this->guideModel = new GuideModel();
        }
        public function index() {
            $tours = $this->tourModel->getNewTour();
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