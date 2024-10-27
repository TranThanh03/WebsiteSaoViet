<?php 
    class appointmentController extends BaseController {
        public $appointmentModel;
        public $userModel;
        public $accountModel;
        public $guideModel;
        public $tourModel;

        public function __construct() {
            $this->model("appointmentModel");
            $this->appointmentModel = new appointmentModel();

            $this->model("userModel");
            $this->userModel = new userModel();

            $this->model("accountModel");
            $this->accountModel = new accountModel();

            $this->model("guideModel");
            $this->guideModel = new guideModel();

            $this->model("tourModel");
            $this->tourModel = new tourModel();
        }

        public function index() {
            $calendars = $this->appointmentModel->getAll();
        
            usort($calendars, function($a, $b) {
                $order = ['Đang xử lý' => 1, 'Đã xác nhận' => 2, 'Đã hủy' => 3];
                $statusComparison = $order[$a->TrangThai] <=> $order[$b->TrangThai];
            
                if ($statusComparison === 0) {
                    return $b->MaLD <=> $a->MaLD;
                }
        
                return $statusComparison;
            });
            
            return $this->view("appointment.index",
                ['calendars' => $calendars]
            );
        }

        public function detail() {
            if($_REQUEST['id']) {
                $calendar = $this->appointmentModel->getAppointment(['*'], 'MaLD', $_REQUEST['id']);
                $user = $this->userModel->getUser(['*'], 'MaKH', $calendar[0]->MaKH);
                $account = $this->accountModel->getAccount(['SDT'], 'MaTK', $user[0]->MaTK);
                $guide = $this->guideModel->getGuide(['TenHDV', 'AnhHDV', 'Gia'], 'MaHDV', $calendar[0]->MaHDV);
                $tour = $this->tourModel->getTour(['*'], 'MaTour',  $calendar[0]->MaTour);

                return $this->view("appointment.detail",
                    [
                        'calendar' => $calendar,
                        'user' => $user,
                        'account' => $account,
                        'guide' => $guide,
                        'tour' => $tour
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