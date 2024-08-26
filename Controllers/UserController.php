<?php 
    class userController extends BaseController {
        public $userModel;
        public $data;
        public function __construct() {
            $this->model("userModel");
            $this->userModel = new userModel();
        }
        public function index() {
            return $this->view("user.login");
        }
        public function register() {
            return $this->view('user.register');
        }

        private function isValidUsername($username) {
            return preg_match('/^[a-zA-Z0-9_]+$/', $username);
        }

        public function login() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                if(empty($user) || empty($pass)) {
                    return $this->view('user.login',[
                        'warning' => 'Bạn cần nhập thông tin đăng nhập!'
                    ]);
                } 
                else {
                    if(!$this->isValidUsername($user)) {
                        return $this->view('user.login',[
                            'warning' => 'Tài khoản không hợp lệ!'
                        ]);
                    }
                }
                $this->data = $this->userModel->loginUser(['TenTK', 'MatKhau', 'Quyen'], [$user, $pass], userModel::TABLE_ACCOUNT);
            }

            if(!empty($this->data) && $this->data[0]['Quyen'] == 'user') {
                $_SESSION['username'] = $_POST['username'];
                header('location: index.php?controller=home&action=index');
            }
            else if(!empty($this->data) && $this->data[0]['Quyen'] == 'admin')
            {
                $_SESSION['accountAdmin'] = $_POST['username'];
                $_SESSION['passwordAdmin'] = $_POST['password'];
                header('location: /WebsiteSaoViet/Admin/index.php?controller=home&action=index');
            } 
            else {
                $warning = "Tài khoản hoặc mật khẩu không đúng!";
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

                if(!$this->isValidUsername($username)) {
                    return $this->view('user.login',[
                        'warning' => 'Tên tài khoản chỉ cho phép chữ cái thường, chữ cái hoa, số, và dấu gạch dưới!'
                    ]);
                }

                if($password !== $_POST['repeatpw']) {
                    return $this->view('user.register',[
                        'warning' => 'Mật khẩu không khớp!'
                    ]);
                } 

                if(empty($fullName) || empty($numberPhone) || empty($email) || empty($username) ||empty($password)) {
                    return $this->view('user.register',[
                        'warning' => 'Không được để trống thông tin!'
                    ]);
                } 

                $userByPhone = $this->userModel->getUser(["SDT"], 'SDT', $numberPhone, userModel::TABLE_USER);
                $userByEmail = $this->userModel->getUser(["Email"], 'Email', $email, userModel::TABLE_USER);
                $userByUsername = $this->userModel->getUser(["TenTK"], 'TenTK', $username, userModel::TABLE_ACCOUNT);

                if(!empty($userByUsername)) {
                    return $this->view('user.register',[
                        'warning' => 'Tài khoản đã tồn tại!'
                    ]);
                }
                else if(!empty($userByPhone)) {
                    return $this->view('user.register',[
                        'warning' => 'Số điện thoại đã tồn tại!'
                    ]);
                } 
                else if(!empty($userByEmail)) {
                    return $this->view('user.register',[
                        'warning' => 'Email đã tồn tại!'
                    ]);
                } 
                else {
                    $dataAccount = $this->userModel->insertUser(['TenTK','MatKhau', 'Quyen'], ["'{$username}'", "'{$password}'", "'user'"], userModel::TABLE_ACCOUNT);
                    $getIdAccount = $this->userModel->getUser(['MaTK'], 'TenTK', $username, userModel::TABLE_ACCOUNT);
                    $dataUser = $this->userModel->insertUser(['TenKH','SDT', 'Email', 'MaTK'], ["'{$fullName}'", "'{$numberPhone}'", "'{$email}'", "'{$getIdAccount[0]['MaTK']}'"], userModel::TABLE_USER);
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