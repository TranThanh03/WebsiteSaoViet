<?php 
    class UserController extends BaseController {
        public $userModel;
        public $data;
        public function __construct() {
            $this->model("UserModel");
            $this->userModel = new UserModel();
        }
        public function index() {
            return $this->view("user.login");
        }
        public function register() {
            return $this->view('user.register');
        }

        public function login() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                if(empty($user)|| empty($pass)) {
                    return $this->view('user.login',[
                        'warning' => 'Bạn cần nhập thông tin đăng nhập'
                    ]);
                } 
                $this->data = $this->userModel->loginUser(['TenTK', 'MatKhau', 'Quyen'], [$user, $pass], UserModel::TABLE_ACCOUNT);
            }

            if(!empty($this->data) && $this->data[0]['Quyen'] == 'user') {
                $_SESSION['username'] = $_POST['username'];
                header('location: index.php?controller=home&action=index');
            }
            else if(!empty($this->data) && $this->data[0]['Quyen'] == 'admin')
            {
                $_SESSION['accountAdmin'] = $_POST['username'];
                $_SESSION['passwordAdmin'] = $_POST['password'];
                header('location: /DuLichSaoViet/Admin/index.php?controller=home&action=index');
            } 
            else {
                $warning = "Số điện thoại hoặc mật khẩu không đúng";
                return $this->view('user.login', 
                ['warning' => $warning]);
            }
        }
        public function logout() {
            unset($_SESSION['username']);
            header('location: index.php?controller=home&action=index' );
        }

        public function createAccount() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $fullName = $_POST['full-name'];
                $numberPhone = $_POST['number-phone'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                if($password !== $_POST['repeatpw']) {
                    return $this->view('user.register',[
                        'warning' => 'Mật khẩu không khớp'
                    ]);
                } 

                if(empty($fullName) || empty($numberPhone) || empty($email) || empty($username) ||empty($password)) {
                    return $this->view('user.register',[
                        'warning' => 'Không được để trống thông tin'
                    ]);
                } 

                $userByPhone = $this->userModel->getUser(["*"], 'SDT', $numberPhone, UserModel::TABLE_USER);
                $userByEmail = $this->userModel->getUser(["*"], 'Email', $email, UserModel::TABLE_USER);

                if(!empty($userByPhone)) {
                    return $this->view('user.register',[
                        'warning' => 'Số điện thoại đã tồn tại'
                    ]);
                } else if(!empty($userByEmail)) {
                    return $this->view('user.register',[
                        'warning' => 'Email đã tồn tại'
                    ]);
                } else {
                    $dataUser = $this->userModel->insertUser(['TenKH','SDT', 'Email'], ["'{$fullName}'", "'{$numberPhone}'", "'{$email}'"], UserModel::TABLE_USER);
                    $dataAccount = $this->userModel->insertUser(['TenTK','MatKhau', 'Quyen'], ["'{$username}'", "'{$password}'", "'user'"], UserModel::TABLE_ACCOUNT);
                    if($dataAccount && $dataUser) {
                        $_SESSION['username'] = $username;
                        header('location: index.php?controller=user&action=login');
                    } else {
                        echo 'lỗi';
                    }
                }

            }
        }

    } 
?>