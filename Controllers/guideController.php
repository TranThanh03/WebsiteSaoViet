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
                if(isset($_SESSION['username'])) {
                    $guides = $this->guideModel->getById(['*'], "MaTour", $_REQUEST['idTour']);
                    return $this->view("guide.index", 
                    [
                        "guides" => $guides
                    ]
                    );
                }
                else {
                    header("Location: index.php?controller=user&action=index");
                }
            }
            else {
                $guides = $this->guideModel->getAll();
                return $this->view("guide.index", 
                    [
                        "guides" => $guides
                    ]
                );
            }
        }
        public function detail() {
            $value = $_REQUEST['id'] ?? '';
            $guide = $this->guideModel->getById(['*'],"MaHDV", $value);
            $tour = $this->tourModel->getTour(['MaTour', 'TenTour', 'AnhTour', 'GioiThieu', 'Gia'], "MaTour", $guide[0]->MaTour);

            return $this->view("guide.detail",[
                'guide' => $guide,
                'tour' => $tour
            ]);
        }
    }