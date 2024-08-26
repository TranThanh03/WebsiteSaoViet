<?php 
    class guideController extends BaseController {
        public $guideModel;
        public $tourModel;

        public function __construct() {
            $this->model('guideModel');
            $this->guideModel = new guideModel();

            $this->model('tourModel');
            $this->tourModel = new tourModel();
        }

        public function index() {
            if(isset($_REQUEST['idTour'])) {
                $data = $this->guideModel->getById(['*'], "MaTour", $_REQUEST['idTour']);
                return $this->view("guide.index",[
                    'data' => $data
                ]);
            }
            else {
                $data = $this->guideModel->getAll();
                return $this->view("guide.index",[
                    'data' => $data
                ]);
            }
        }
        public function detail() {
            $value = $_REQUEST['id'] ?? '';
            $data = $this->guideModel->getById(['*'],"MaHDV", $value);
            $tour = $this->tourModel->getTour(['MaTour', 'TenTour', 'AnhTour', 'GioiThieu', 'Gia'], "MaTour", $data[0]['MaTour']);

            return $this->view("guide.detail",[
                'data' => $data,
                'tour' => $tour
            ]);
        }
    }