<?php 
    class AuthController extends BaseController {
        public $userModel;
        public $accountModel;
        public $account;

        public function __construct() {
            $this->model("UserModel");
            $this->userModel = new UserModel();

            $this->model("AccountModel");
            $this->accountModel = new AccountModel();
        }
        public function index() {
            return $this->view("auth.login");
        }
        public function register() {
            return $this->view('auth.register');
        }

        private function isValidUsername($username) {
            return preg_match('/^[0-9]{10}$/', $username);
        }

        private function isNumberUsername($username) {
            return preg_match('/^[0-9]+$/', $username);
        }

        private function isTrueUsername($username) {
            return preg_match('/^[a-zA-Z0-9@.]+$/', $username);
        }

        public function login() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if(empty($username) || empty($password)) {
                    return $this->view('auth.login',[
                        'warning' => 'Bạn cần nhập thông tin đăng nhập!'
                    ]);
                } 

                if(!$this->isTrueUsername($username)) {
                    return $this->view('auth.login',[
                        'warning' => 'Tài khoản nhập chỉ được nhập chữ, số, @ và dấu chấm!'
                    ]);
                }

                if($this->isNumberUsername($username)) {
                    $this->account = $this->accountModel->getAccount(['MaTK', 'MatKhau', 'Quyen'], 'SDT', $username);
                }
                else {
                    $this->account = $this->accountModel->getAccount(['MaTK', 'SDT', 'MatKhau', 'Quyen'], 'Email', $username);
                    
                    if(!empty($this->account)) {                        
                        $username = $this->account[0]->SDT;
                    }
                }

                if(!empty($this->account) && password_verify($password, $this->account[0]->MatKhau) && $this->account[0]->Quyen == 'user') {
                    $getUser = $this->userModel->getUser(['TenKH'], 'MaTK', $this->account[0]->MaTK);
                    
                    $_SESSION['username'] = $username;
                    $_SESSION['fullNameUser'] = $getUser[0]->TenKH;

                    header('location: index.php?controller=home&action=index');
                }
                else if(!empty($this->account) && password_verify($password, $this->account[0]->MatKhau) && $this->account[0]->Quyen == 'admin')
                {
                    $_SESSION['accountAdmin'] = $_POST['username'];
                    $_SESSION['passwordAdmin'] = $_POST['password'];

                    header('location: /WebsiteSaoViet/Admin/index.php?controller=home&action=index');
                } 
                else {
                    $warning = "Tài khoản hoặc mật khẩu không đúng!";

                    return $this->view('auth.login', 
                    ['warning' => $warning]);
                }
            }
        }
        public function logout() {
            unset($_SESSION['username']);
            unset($_SESSION['fullNameUser']);

            header('location: index.php?controller=home&action=index');
        }

        public function createAccount() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $fullName = $_POST['full-name'];
                $numberPhone = $_POST['number-phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if(empty($fullName) || empty($numberPhone) || empty($email) ||empty($password)) {
                    return $this->view('auth.register',[
                        'warning' => 'Không được để trống thông tin!'
                    ]);
                } 

                if(!$this->isValidUsername($numberPhone)) {
                    return $this->view('auth.register',[
                        'warning' => 'Số điện thoại chỉ được nhập số và có độ dài 10 chữ số!'
                    ]);
                }

                if($password !== $_POST['repeatpw']) {
                    return $this->view('auth.register',[
                        'warning' => 'Mật khẩu không khớp!'
                    ]);
                } 

                $userByPhone = $this->accountModel->getAccount(["SDT"], 'SDT', $numberPhone);
                $userByEmail = $this->accountModel->getAccount(["Email"], 'Email', $email);
                
                if(!empty($userByPhone) && !empty($userByEmail)) {
                    return $this->view('auth.register',[
                        'warning' => 'Số điện thoại và Email đã tồn tại!!'
                    ]);
                }
                else if(!empty($userByPhone)) {
                    return $this->view('auth.register',[
                        'warning' => 'Số điện thoại đã tồn tại!'
                    ]);
                } 
                else if(!empty($userByEmail)) {
                    return $this->view('auth.register',[
                        'warning' => 'Email đã tồn tại!'
                    ]);
                } 
                else {
                    $passwordEncrypt = password_hash($password, PASSWORD_DEFAULT);

                    $dataAccount = $this->accountModel->insertAccount(['SDT', 'Email', 'MatKhau', 'Quyen'], [$numberPhone, $email, $passwordEncrypt, "user"]);
                    $getIdAccount = $this->accountModel->getAccount(['MaTK'], 'SDT', $numberPhone);
                    $dataUser = $this->userModel->insertUser(['TenKH', 'MaTK'], [$fullName, $getIdAccount[0]->MaTK]);
                    
                    if($dataAccount && $dataUser) {
                        $_SESSION['username'] = $numberPhone;
                        $_SESSION['fullNameUser'] = $fullName;

                        header('location: index.php?controller=home&action=index');
                    } else {
                        echo 'Lỗi';
                    }
                }

            }
        }
    } 
?>