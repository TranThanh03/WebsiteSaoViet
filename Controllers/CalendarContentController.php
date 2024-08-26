<?php 
    class calendarContentController extends BaseController {
        public $calendarModel;
        public $userModel;
        public $tourModel;
        public $guideModel;

        public function __construct() {
            $this->model('calendarModel');
            $this->calendarModel = new calendarModel();
            
            $this->model('userModel');
            $this->userModel = new userModel();
            
            $this->model('tourModel');
            $this->tourModel = new tourModel();

            $this->model('guideModel');
            $this->guideModel = new guideModel();
        }

        public function index() {
            if(isset($_SESSION['username'])) {
                $idTour = $_REQUEST['idTour'] ?? '';
                $idGuide = $_REQUEST['idGuide'] ?? '';
                
                $datas = $this->_get($idTour, $idGuide);
                return $this->view("calendarContent.index",[
                    'tour' => $datas['tour'],
                    'user' => $datas['user'],
                    'guide' => $datas['guide'] 
                ]);
            } else {
                header("Location: index.php?controller=user&action=index");
            }
        }

        public function booking() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $MaKH = $_POST['user-code'];
                $MaTour = $_POST['tour-code'];
                $MaHDV = $_POST['guide-code'];
                $TongTien = str_replace("VND", "", $_POST['total-price']);
                $CurrentTime = date('Y-m-d H:i:s');
                
                $createCalendar = $this->calendarModel->createCalendar(['MaKH','MaTour','MaHDV', 'TongTien', 'ThoiGian', 'TrangThai'], 
                                                                        [$MaKH, $MaTour, $MaHDV, "'{$TongTien}'", "'{$CurrentTime}'", "'Đang xử lý'"]);
                    
                if(!empty($createCalendar)) {
                    return $this->view('message.index',[
                        'title' => 'Đặt Tour thành công',
                        'message' => 'Vui lòng để ý Tour đã đặt!'
                    ]);
                } else {
                    return $this->view("cmessage.index",[
                        'title' => 'Đặt Tour không thành công',
                        'message' => 'Không thể đặt Tour, vui lòng đặt Tour lại!',
                    ]);
                }
            }

        }

        private function _get($idTour, $idGuide) {
            $idUser = $this->userModel->getUser(['MaTK'], 'TenTK', $_SESSION['username'], userModel::TABLE_ACCOUNT);
            $user = $this->userModel->getUser(['*'], 'MaTK', $idUser['0']['MaTK']);
            $tour = $this->tourModel->getById(['MaTour', 'TenTour', 'AnhTour', 'Gia'],'MaTour', $idTour);
            $guide = $this->guideModel->getById(['MaHDV', 'TenHDV', 'AnhHDV', 'DanhGia', 'Gia'],'MaHDV', $idGuide);

            return [
                'tour' => $tour,
                'user' => $user,
                'guide' => $guide
            ];
        }
    } 