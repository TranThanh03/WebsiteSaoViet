<?php 
    class FacultyController extends BaseController {
        public $facultyModel;

        public function __construct() {
            $this->model('FacultyModel');
            $this->facultyModel = new FacultyModel();
        }
        public function index() {
            if(isset($_REQUEST['tenkhoa'])) {
                $data = $this->facultyModel->searchFaculty(['MaKhoa', 'TenKhoa','HinhAnh'], "TenKhoa", $_REQUEST['tenkhoa']);
                if(!empty($data)) {
                    return $this->view('faculty.index',[
                        'data' => $data
                    ]);
                } else {
                    return $this->view('faculty.index',[
                        'warning' => "Không tìm thấy khoa khám cần tìm"
                    ]);
                }
            } else {
                $data = $this->facultyModel->getAll();
                return $this->view('faculty.index',[
                    'data' => $data
                ]);

            }
        }
        public function search() {
            $TenKhoa = $_POST['search_tenkhoa'];
            header("location: index.php?controller=faculty&action=index&tenkhoa={$TenKhoa}");
        }
    }
?>