<?php
    class HomeController extends BaseController {
        public $facultyModel;
        public $doctorModel;
        public function __construct() {
            $this->model('FacultyModel');
            $this->model('DoctorModel');
            $this->facultyModel = new FacultyModel();
            $this->doctorModel = new DoctorModel();
        }
        public function index() {
            $dataFaculty = $this->facultyModel->getAll();
            $dataDoctor = $this->doctorModel->getById(['MaBS', 'TenBS', 'anh', 'TenKhoa'], 'DanhGia', '5');
            return $this->view("home.index",
                [
                    'dataFaculty' => $dataFaculty,
                    'dataDoctor' => $dataDoctor    
                ],
            );
        }
    }
?>