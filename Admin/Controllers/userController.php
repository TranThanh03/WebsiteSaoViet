<?php 
    class userController extends BaseController {
        public $userModel;
        function __construct() {
            $this->model("userModel");
            $this->userModel = new userModel();
        }
        function index() {
            $data = $this->userModel->getAll();
            return $this->view("user.index",
            ['data' => $data]);
        }

        public function insert() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $TenKH = $_POST['TenKH'];
                $sdt = $_POST['sdt'];
                $DiaChi = $_POST['DiaChi'];
                $email = $_POST['email'];
                $NgaySinh = $_POST['NgaySinh'];
                $GioiTinh = $_POST['GioiTinh'];
                $data = $this->userModel->insertUser(
                ['TenKH','sdt','DiaChi','email' ,'NgaySinh' ,'GioiTinh'], 
                ["'{$TenKH}'", "'{$sdt}'", "'{$DiaChi}'", "'{$email}'", "'{$NgaySinh}'", "'{$GioiTinh}'"]);
    
                if($data) {
                    header('location: index.php?controller=user&action=index');
                } else {
                    // header('location: index.php?controller=user&action=index');
                    echo 'lỗi';
                }
            }
        }

        public function update() {
            $id = $_REQUEST['id'] ?? '';
            if(empty($id)) {
                echo "Lỗi";
            } else {
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->userModel->updateUser(
                    ['TenKH','sdt', 'DiaChi', 'email', 'NgaySinh', 'GioiTinh'],
                    [$_POST['TenKH'],  $_POST['sdt'], $_POST['DiaChi'], $_POST['email'],$_POST['NgaySinh'], $_POST['GioiTinh']], 
                    'MaKH', $id);
                    header('location: index.php?controller=user&action=index');
                } else {
                    echo 'Lỗi rồi' ;
                }
            }
        }
        
        public function showForm() {
            $id = $_REQUEST['id'] ?? '';

            if(empty($id)) {
                echo "Lỗi";
            } else {
                $data = $this->userModel->getUser(
                ['MaKH', 'TenKH','sdt', 'DiaChi', 'email', 'NgaySinh', 'GioiTinh'], 
                'MaKH', $id);

                return $this->view("user.formUpdateUser",
                ['data' => $data]);
            }
        }

        public function delete() {
            $id = $_REQUEST['id'] ?? '';

            if(empty($id)) {
                echo "Lỗi";
            } else {
                $this->userModel->deleteUser( $id, 'MaKH');
                header('location: index.php?controller=user&action=index');
            }

        }
    }

?>