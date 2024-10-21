<?php 
    class appointmentController extends BaseController {
        public $appointmentModel;
        public $userModel;
        public $guideModel;
        public $tourModel;

        public function __construct() {
            $this->model("appointmentModel");
            $this->appointmentModel = new appointmentModel();

            $this->model("userModel");
            $this->userModel = new userModel();

            $this->model("guideModel");
            $this->guideModel = new guideModel();

            $this->model("tourModel");
            $this->tourModel = new tourModel();
        }

        public function index() {
            $data = $this->appointmentModel->getAll();
            
            usort($calendars, function($a, $b) {
                $order = ['Đang xử lý' => 1, 'Đã xác nhận' => 2, 'Đã hủy' => 3];
                $statusComparison = $order[$a[0]->TrangThai] <=> $order[$b[0]->TrangThai];
            
                if ($statusComparison === 0) {
                    return $b[0]->MaLD <=> $a[0]->MaLD;
                }
        
                return $statusComparison;
            });
            

            return $this->view("appointment.index",
                ['data' => $data]
            );
        }

        public function detail() {
            if($_REQUEST['id']) {
                $data = $this->appointmentModel->getAppointment(['*'], 'MaLD', $_REQUEST['id']);
                $user = $this->userModel->getUser(['*'], 'MaKH', $data[0]['MaKH']);
                $guide = $this->guideModel->getGuide(['TenHDV', 'AnhHDV', 'Gia'], 'MaHDV', $data[0]['MaHDV']);
                $tour = $this->tourModel->getTour(['*'], 'MaTour',  $data[0]['MaTour']);

                return $this->view("appointment.detail",
                    [
                        'data' => $data
                    ]
                );
            }
        }

        public function update() {
            $id = $_REQUEST['id'] ?? '';
            $status = $_REQUEST['status'] ?? '';

            if(empty($id) || empty($status)) {
                echo "Lỗi";
            } else {
                if($status === 'confirm') {
                    $this->appointmentModel->updateAppointment(
                    ['TrangThai'], ["Đã xác nhận"]
                    , 'MaLD', $id);
                } 
                else {
                    $this->appointmentModel->updateAppointment(
                    ['TrangThai'], ["Đã hủy"]
                    , 'MaLD', $id);
                }
                
                header("location: index.php?controller=appointment&action=detail&id=$id");
            }
        }
    }
?>