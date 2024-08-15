<?php 
    class DoctorController extends BaseController {
        public $doctorModel;
        public function __construct() {
            $this->model('DoctorModel');
            $this->doctorModel = new DoctorModel();
        }
        public function index() {
            $data = $this->doctorModel->getAll();
            return $this->view("doctor.index",[
                'data' => $data
            ]);
        }
        public function detail() {
            $value = $_REQUEST['id'] ?? '';
            $data = $this->doctorModel->getById(['MaBS', 'TenBS', 'anh', 'DanhGia','GiaKham', 'bacsi.GioiThieu','TenKhoa'],"MaBS", $value);
            return $this->view("doctor.detail",[
                'data'=>$data,
            ]);
        }
    }

?>