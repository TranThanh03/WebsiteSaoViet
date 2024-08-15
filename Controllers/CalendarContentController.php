<?php 
    class CalendarContentController extends BaseController {
        public $doctorModel;
        public $userModel;
        public $CalendarModel;
        public $RoomModel;
        public function __construct() {
            $this->model('DoctorModel');
            $this->doctorModel = new DoctorModel();
            $this->userModel = new UserModel();
            $this->CalendarModel = new CalendarModel();
            $this->model('RoomModel');
            $this->RoomModel = new RoomsModel();
        }

        public function index() {
            if(isset($_SESSION['sdt']) ) {
                $value = $_REQUEST['id'] ?? '';
                $datas = $this->_get($value);
                return $this->view("calendarContent.index",[
                    'data'=>$datas['data'],
                    'idUser'=>$datas['users'],
                ]);
            } else {
                // return $this->view("user.index");
                header("Location: index.php?controller=user&action=index");
            }
        }

        public function booking() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $MaKH = $_POST['MaKH'];
                $TenKH = $_POST['TenKH'];
                $GioiTinh = $_POST['gender'];
                $NgaySinh = $_POST['NgaySinh'];
                $DiaChi = $_POST['DiaChi'];
                $ThoiGianKham = $_POST['ThoiGianKham'];
                $NgayKham = $_POST['NgayKham'];
                $MaBS = $_POST['MaBS'];
                $MaKhoa = $_POST['MaKhoa'];
                $NoiDungKham = $_POST['NoiDungKham'];
                $GhiChu = $_POST['GhiChu'];

                if(empty($TenKH) || empty($NgaySinh) || empty($ThoiGianKham) || empty($NgayKham)) {
                    $value = $_POST['MaBS'];
                    $datas = $this->_get($value);
                    return $this->view("calendarContent.index",[
                        'data'=>$datas['data'],
                        'idUser'=>$datas['users'],
                        'warning' => 'Vui lòng điền đầy đủ thông tin',
                    ]);
                } else {
                    $update = $this->userModel->updateUser(['TenKH','GioiTinh','NgaySinh','DiaChi'],[$TenKH,$GioiTinh,$NgaySinh,$DiaChi], 'MaKH', $MaKH);
                    if(!empty($update)) {
                        $rooms = $this->RoomModel->getById(['MaPhongKham'], 'MaKhoa', $MaKhoa);
                        $room = $rooms[rand(0, count($rooms)-1)]['MaPhongKham']; ;
                        $createCalendar = $this->CalendarModel->createCalendar(['ThoiGianKham','NgayKham','NoiDungKham','GhiChu','MaKH','MaBS','MaPhongKham'],
                            ["'{$ThoiGianKham}'","'{$NgayKham}'","'{$NoiDungKham}'","'{$GhiChu}'","'{$MaKH}'","'{$MaBS}'","'{$room}'"]);
                            
                        if(!empty($createCalendar)) {
                            return $this->view('message',[
                                'title' => 'Đặt lịch thành công',
                                'message' => 'Vui lòng để ý lịch hẹn và đến đúng giờ'
                            ]);
                            // header("Location: {$_SERVER['PHP_SELF']}");
                        } else {
                            $value = $_POST['MaBS'];
                            $datas = $this->_get($value);
                            return $this->view("calendarContent.index",[
                                'data'=>$datas['data'],
                                'idUser'=>$datas['users'],
                                'warning' => 'Không thể đặt lịch, vui lòng kiểm tra lại thông tin',
                            ]);
                        }
                    } else {
                        $value = $_POST['MaBS'];
                        $datas = $this->_get($value);
                        return $this->view("calendarContent.index",[
                            'data'=>$datas['data'],
                            'idUser'=>$datas['users'],
                            'warning' => 'Không thể đặt lịch, vui lòng kiểm tra lại thông tin',
                        ]);
                    }
                }

            }
        }

        private function _get($value) {
            $idUser = $this->userModel->getUser(['MaKH'], 'sdt', $_SESSION['sdt']);
            $users = $this->userModel->getUser(['MaKH','TenKH', 'DiaChi', 'sdt', 'email','NgaySinh','GioiTinh'], 'MaKH', $idUser['0']['MaKH']);
            $data = $this->doctorModel->getById(['MaBS', 'TenBS', 'anh','GiaKham','bacsi.MaKhoa','TenKhoa'],"MaBS", $value);

            return [
                'data' => $data,
                'users' => $users,
            ];
        }
    } 
?>