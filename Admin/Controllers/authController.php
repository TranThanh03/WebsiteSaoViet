<?php
    class authController extends BaseController {
        public $authModel;
        public $data;
        public function __construct() {
            $this->model("authModel");
            $this->authModel = new authModel();
        }

        public function index() {
            return $this->view('auth.login');
        }

        public function login() {
            if($_SERVER['REQUEST_METHOD'] ===  'POST') {
                $name = $_POST['accountAdmin'];
                $pass = $_POST['passwordAdmin'];
                $this->data = $this->authModel->loginAdmin(['TenDangNhap', 'MatKhau'], [$name, $pass]);
            }
            
            if(!empty($this->data)) {
                $_SESSION['accountAdmin'] = $_POST['accountAdmin'];
                $_SESSION['passwordAdmin'] = $_POST['passwordAdmin'];
                return $this->view('home.index');
                // header('Location: index.php?controller=home&action=index');
            } else {
                // header('Location: index.php?controller=home&action=index');
                $warning = "tên đăng nhập hoặc mật khẩu admin không đúng";
                return $this->view('auth.login', 
                ['warning' => $warning]);
            }
        }

        public function logout() {
            unset($_SESSION['accountAdmin']);
            unset($_SESSION['passwordAdmin']);
            header('location: index.php?controller=home&action=index' );
        }
    }
?>