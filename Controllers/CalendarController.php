<?php 
    class CalendarController extends BaseController {
        public $Calendar;
        public $User;
        public function __construct()
        {
            $this->model('CalendarModel');
            $this->Calendar = new CalendarModel();
            $this->model('UserModel');
            $this->User = new UserModel();
        }
        public function index() {
            if(isset($_SESSION['username'] )) {
                $idUser = $this->User->getUser(['MaKH'], 'TenKH', $_SESSION['username']);
                if(!empty($idUser)) {
                    $data = $this->Calendar->getById(['MaLichKham','ThoiGianKham','TenPhongKham','TenKhoa', 'TenBS','TenTrangThai', 'NgayKham'], 'lichkham.MaKH', $idUser['0']['MaKH']);
                    return $this->view('calendar.index',[
                        'data' => $data
                    ]);
                } else {
                    return $this->view('calendar.index',[
                        'data' => []
                    ]);
                }
            } else {
                return $this->view('calendar.index',[
                    'data' => []
                ]);
            }
        } 

        public function delete () {
            $idCalendar = $_REQUEST['username'];
            $data = $this->Calendar->deleteCalendar($idCalendar,'MaLichKham');
            if(!empty($data)) {
                return $this->view('message',[
                    'title' => 'Hủy lịch thành công',
                    'message' => 'Lịch khám của bạn đã được hủy'
                ]);
                // header('location: index.php');
            }
        }
    }
?>