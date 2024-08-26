<?php 
    class calendarController extends BaseController {
        public $calendarModel;
        public $userModel;
        public function __construct()
        {
            $this->model('calendarModel');
            $this->calendarModel = new calendarModel();
            $this->model('UserModel');
            $this->userModel = new userModel();
        }
        public function index() {
            if(isset($_SESSION['username'] )) {
                $idAcc = $this->userModel->getUser(['MaTK'], 'TenTK', $_SESSION['username'], userModel::TABLE_ACCOUNT);
                $idUser = $this->userModel->getUser(['MaKH'], 'MaTK', $idAcc[0]['MaTK'], userModel::TABLE_USER);
                $idCalendar = $this->calendarModel->getCalendar(['MaLD'], 'MaKH', $idUser[0]['MaKH']);
                
                if(!empty($idCalendar)) {
                    $data = $this->calendarModel->getById(['*'], "MaLD", $idCalendar[0]['MaLD']);
                    return $this->view('calendar.index',[
                        'data' => $data
                    ]);
                } else {
                    return $this->view('calendar.index',[
                        'data' => []
                    ]);
                }
            } else {
                return $this->view('calendar.index');
            }
        } 

        public function cancel() {
            $id = $_REQUEST['id'];
            $data = $this->calendarModel->cancelCalendar(['TrangThai'], ['Hủy'], 'MaLD', $id);
            if(!empty($data)) {
                return $this->view('message.index', [
                    'title' => 'Hủy Tour thành công',
                    'message' => 'Lịch đặt của bạn đã được hủy!'
                ]);
            }
        }
    }
?>