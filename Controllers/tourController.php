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
            $tour = $this->tourModel->getById(['*'],"MaTour", $value);
            
            return $this->view("tour.detail", [
                'tour' => $tour
            ]);
        }

        public function list() {
            $value = $_REQUEST['id'] ?? '';
            if($value != '') {
                $tours = $this->tourModel->getById(['*'],"MaCD", $value);
            } else {
                $tours = $this->tourModel->getAll();
            }

            return $this->view("tour.list", [
                'tours' => $tours
            ]);
        }

        public function search() {
            $nameTour = $_POST['search_tour'] ?? '';
            if($nameTour != '') {
                $tours = $this->tourModel->searchTour(['*'], 'TenTour', $nameTour);
            } else {
                $tours = [];
            }

            return $this->view("tour.list", [
                'tours' => $tours
            ]);
        }
    }