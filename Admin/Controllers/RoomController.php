<?php 
    class RoomController extends BaseController {
        public $roomModel;
        public $serviceModel;

        public function __construct() {
            $this->model('RoomModel');
            $this->roomModel = new roomModel();
            
            $this->model("serviceModel");
            $this->serviceModel = new serviceModel();
        }

        public function index() {
            $data = $this->roomModel->getAll(['MaPhongKham', 'TenPhongKham', 'khoakham.MaKhoa', 'TenKhoa']);
            $services = $this->serviceModel->getAll();
            return $this->view('rooms.index',
            [
                'data' => $data,
                'services' => $services
            ]
        );
        }

        public function insert() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $TenPhongKham = $_POST['TenPhongKham'];
                $MaKhoa = $_POST['MaKhoa'];
                $data = $this->roomModel->insertRoom(
                ['TenPhongKham', 'MaKhoa'], 
                ["'{$TenPhongKham}'", "'{$MaKhoa}'"]);
    
                if($data) {
                    header('location: index.php?controller=room&action=index');
                } else {
                    echo 'lỗi';
                }
            }
        }

        public function delete() {
            $id = $_REQUEST['id'] ?? '';
            if(empty($id)) {
                echo "Lỗi";
            } else {
                $this->roomModel->deleteRoom($id, 'MaPhongKham');
                header('location: index.php?controller=room&action=index');
            }

        }
    }

?>