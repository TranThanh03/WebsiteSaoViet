<?php 
    class guideController extends BaseController {
        public $guideModel;
        public function __construct() {
            $this->model('guideModel');
            $this->guideModel = new guideModel();
        }

            public function index() {
            $data = $this->guideModel->getAll();
            return $this->view("doctor.index",[
                'data' => $data
            ]);
        }
        public function detail() {
            $value = $_REQUEST['id'] ?? '';
            $data = $this->guideModel->getById(['*'],"MaHDV", $value);
            return $this->view("tour.detail",[
                'data'=>$data,
            ]);
        }
    }