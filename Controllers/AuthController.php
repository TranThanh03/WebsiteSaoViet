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
                    $this->account = $this->accountModel->loginAccount(['SDT', 'MatKhau', 'Quyen'], [$username, $password]);
                    
                    if(!empty($this->account)) {
                        $idAcc = $this->accountModel->getAccount(['MaTK'], 'SDT', $username);
                        $getUserByIdAcc = $this->userModel->getUser(['TenKH, Email'], 'MaTK', $idAcc[0]->MaTK);
                        $username = $getUserByIdAcc[0]->Email;
                        $fullName = $getUserByIdAcc[0]->TenKH;
                    }
                }
                else {
                    $getUserByUsername = $this->userModel->getUser(['MaTK, TenKH'], 'Email', $username);
                    if(!empty($getUserByUsername)) {
                        $this->account = $this->accountModel->loginAccount(['MaTK', 'MatKhau', 'Quyen'], [$getUserByUsername[0]->MaTK, $password]);
                        $fullName = $getUserByUsername[0]->TenKH;
                    }
                }

                if(!empty($this->account) && $this->account->Quyen == 'user') {
                    $_SESSION['username'] = $username;
                    $_SESSION['fullNameUser'] = $fullName;
                    header('location: index.php?controller=home&action=index');
                }
                else if(!empty($this->account) && $this->account->Quyen == 'admin')
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

                if(empty($fullName) || empty($numberPhone) || empty($email) ||empty($password)) {
                    return $this->view('auth.register',[
                        'warning' => 'Không được để trống thông tin!'
                    ]);
                } 

                $userByPhone = $this->accountModel->getAccount(["SDT"], 'SDT', $numberPhone);
                $userByEmail = $this->userModel->getUser(["Email"], 'Email', $email);
               
                if(!empty($userByPhone)) {
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
                    $dataAccount = $this->accountModel->insertAccount(['SDT','MatKhau', 'Quyen'], [$numberPhone, $password, "user"]);
                    $getIdAccount = $this->accountModel->getAccount(['MaTK'], 'SDT', $numberPhone);
                    $dataUser = $this->userModel->insertUser(['TenKH', 'Email', 'MaTK'], [$fullName, $email, $getIdAccount[0]->MaTK]);
                    
                    if($dataAccount && $dataUser) {
                        $_SESSION['username'] = $email;
                        $_SESSION['fullNameUser'] = $fullName;
                        header('location: index.php?controller=home&action=index');
                    } else {
                        echo 'lỗi';
                    }
                }

            }
        }
    } 
?>