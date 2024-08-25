<?php 
    class appointmentController extends BaseController {
        public $appointmentModel;
        public $userModel;
        public function __construct() {
            $this->model("appointmentModel");
            $this->appointmentModel = new appointmentModel();
        }

        public function index() {
            $data = $this->appointmentModel->getAll(['*']);
            return $this->view("appointment.index",
                ['data' => $data]
            );
        }

        public function detail() {
            if($_REQUEST['id']) {
                $data = $this->appointmentModel->getAppointment(['*'], 'MaLD', $_REQUEST['id']);
                return $this->view("appointment.detail",
                    ['data' => $data]
                );
            }
        }

        public function update() {
            $id = $_REQUEST['id'] ?? '';
            if(empty($id) || empty($status)) {
                echo "Lỗi";
            } else {
                if($status === 'confirm') {
                    $this->appointmentModel->updateAppointment(
                    ['id_TrangThai'], ['2']
                    , 'MaLichKham', $id);
                } 
                else {
                    $this->appointmentModel->updateAppointment(
                    ['id_TrangThai'], ['3']
                    , 'MaLichKham', $id);
                }
                
                header('location: index.php?controller=appointment&action=index');
            }
        }
    }
?>