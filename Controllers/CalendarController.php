<?php 
    class calendarController extends BaseController {
        public $calendarModel;
        public $userModel;
        public function __construct()
        {
            $this->model('calendarModel');
            $this->calendarModel = new calendarModel();
            
            $this->model('userModel');
            $this->userModel = new userModel();
        }
        public function index() {
            if (isset($_SESSION['username'])) {
                $idAcc = $this->userModel->getUser(['MaTK'], 'TenTK', $_SESSION['username'], userModel::TABLE_ACCOUNT);
                $idUser = $this->userModel->getUser(['MaKH'], 'MaTK', $idAcc[0]['MaTK'], userModel::TABLE_USER);
                $idCalendar = $this->calendarModel->getCalendar(['MaLD'], 'MaKH', $idUser[0]['MaKH']);
                $arrayData = [];
            
                if (!empty($idCalendar)) {
                    foreach ($idCalendar as $value) {
                        $data = $this->calendarModel->getById(['*'], "MaLD", $value['MaLD']);
                        array_push($arrayData, $data);
                    }
                    
                    usort($arrayData, function($a, $b) {
                        $order = ['Đang xử lý' => 1, 'Xác nhận' => 2, 'Hủy' => 3];
                        return $order[$a[0]['TrangThai']] <=> $order[$b[0]['TrangThai']];
                    });

                    return $this->view('calendar.index', [
                        'arrayData' => $arrayData
                    ]);
                } else {
                    return $this->view('calendar.index', [
                        'arrayData' => []
                    ]);
                }            
            } 
            else {
                return $this->view('calendar.index');
            }
        } 

        public function cancel() {
            $id = $_REQUEST['id'];
            $data = $this->calendarModel->cancelCalendar(['TrangThai'], ['Hủy'], 'MaLD', $id);

            if(!empty($data)) {
                echo "
                    <script>alert('Huỷ Tour thành công.');
                    window.location.href = 'index.php?controller=calendar&action=index'</script>;
                ";
            }
            else {
                echo "
                    <script>alert('Lỗi! Huỷ Tour không thành công.')
                    window.location.href = 'index.php?controller=calendar&action=index'</script>;
                ";
            }
        }
    }
?>