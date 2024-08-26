<?php 
    class tourController extends BaseController {
        public $tourModel;

        public function __construct() {
            $this->model('tourModel');
            $this->tourModel = new tourModel();
        }
        public function index() {
            return $this->view('tour.index');
        }

        public function detail() {
            $value = $_REQUEST['id'] ?? '';
            $data = $this->tourModel->getById(['*'],"MaTour", $value);
            return $this->view("tour.detail", [
                'data'=>$data,
            ]);
        }

        public function list() {
            $value = $_REQUEST['id'] ?? '';
            if($value != '') {
                $data = $this->tourModel->getById(['*'],"MaCD", $value);
            } else {
                $data = $this->tourModel->getAll();
            }

            return $this->view("tour.list", [
                'data' => $data
            ]);
        }

        public function search() {
            $TenTour = $_POST['search_tour'] ?? '';
            if($TenTour != '') {
                $data = $this->tourModel->searchTour(['*'], 'TenTour', $TenTour);
            } else {
                $data = [];
            }

            return $this->view("tour.list", [
                'data' => $data
            ]);
        }
    }