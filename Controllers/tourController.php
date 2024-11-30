<?php 
    class TourController extends BaseController {
        public $tourModel;

        public function __construct() {
            $this->model('TourModel');
            $this->tourModel = new TourModel();
        }
        public function index() {
            return $this->view('tour.index');
        }

        public function detail() {
            if(isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
                $value = $_REQUEST['id'];
                $tour = $this->tourModel->getById(['*'],"MaTour", $value);
                
                return $this->view("tour.detail", [
                    'tour' => $tour
                ]);
            }
        }

        public function list() {
            if(isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
                $value = $_REQUEST['id'];
                
                $tours = $this->tourModel->getById(['*'],"MaCD", $value);

                return $this->view("tour.list", [
                    'tours' => $tours
                ]);
            }
            else {
                $tours = $this->tourModel->getAll();

                return $this->view("tour.list", [
                    'tours' => $tours
                ]);
            }
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