<?php 
    class tourController extends BaseController {
        public $tourModel;

        public function __construct() {
            $this->model('tourModel');
            $this->tourModel = new tourModel();
        }
        public function index() {
            if(isset($_REQUEST['tenkhoa'])) {
                $data = $this->tourModel->searchTour(['MaKhoa', 'TenKhoa','HinhAnh'], "TenKhoa", $_REQUEST['tenkhoa']);
                if(!empty($data)) {
                    return $this->view('faculty.index',[
                        'data' => $data
                    ]);
                } else {
                    return $this->view('faculty.index',[
                        'warning' => "Không tìm thấy tour cần tìm"
                    ]);
                }
            } else {
                $data = $this->tourModel->getAll();
                return $this->view('faculty.index',[
                    'data' => $data
                ]);

            }
        }

        public function detail() {
            $value = $_REQUEST['id'] ?? '';
            $data = $this->tourModel->getById(['*'],"MaTour", $value);
            return $this->view("tour.detail",[
                'data'=>$data,
            ]);
        }

        public function search() {
            $TenKhoa = $_POST['search_tenkhoa'];
            header("location: index.php?controller=faculty&action=index&tenkhoa={$TenKhoa}");
        }
    }
?>