<?php 
    class ListController extends BaseController {
        public $ListModel;
        public $facultyModel;
        public function __construct() {
            $this->model('ListModel');
            $this->ListModel = new ListModel();
            $this->model('FacultyModel');
            $this->facultyModel = new FacultyModel();
        }
        public function index() {
            $value = $_REQUEST['id'] ?? '';
            $data = $this->ListModel->getById(['MaBS', 'TenBS', 'anh', 'DanhGia','GiaKham'],"MaKhoa", $value);
            $faculty = $this->facultyModel->getFaculty(['MaKhoa','TenKhoa','GioiThieu'], "MaKhoa", $value);
            return $this->view('list.index',
            [
                'data' => $data,
                'facultys' => $faculty
            ]);
        }
    }
?>