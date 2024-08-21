<?php
    class homeController extends BaseController {
        public $tourModel;
        public $guideModel;
        public function __construct() {
            $this->model('tourModel');
            $this->model('guideModel');
            $this->tourModel = new tourModel();
            $this->guideModel = new guideModel();
        }
        public function index() {
            $dataTour = $this->tourModel->getAll();
            $dataGuide = $this->guideModel->getById(['MaHDV', 'TenHDV', 'AnhHDV', 'NgaySinh'], 'DanhGia', '5');
            return $this->view("home.index",
                [
                    'dataTour' => $dataTour,
                    'dataGuide' => $dataGuide    
                ],
            );
        }
    }
?>