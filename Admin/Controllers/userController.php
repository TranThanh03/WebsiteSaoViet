<?php 
    class UserController extends BaseController {
        public $userModel;
        public $accountModel;
        public $calendarModel;
        
        function __construct() {
            $this->model("userModel");
            $this->userModel = new UserModel();

            $this->model("accountModel");
            $this->accountModel = new AccountModel();

            $this->model("calendarModel");
            $this->calendarModel = new CalendarModel();
        }

        function index() {
            $users = $this->userModel->getAll();

            return $this->view("user.index",
            [
                'users' => $users
            ]);
        }

        public function insert() {
            if(isset($_REQUEST['btn-submit'])) {
                $fullName = $_POST['full-name'];
                $numberPhone = $_POST['number-phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $getByPhone = $this->accountModel->getAccount(['MaTK'], 'SDT', $numberPhone);
                $getByEmail = $this->userModel->getUser(['MaTK'], 'Email', $email);
                
                if(!empty($getByPhone)) {
                    $code = 1;
                    $message = "Số điện thoại đã tồn tại!";
                }
                else if(!empty($getByEmail)) {
                    $code = 1;
                    $message = "Email đã tồn tại!";
                }
                else {
                    $accounts = $this->accountModel->insertAccount(['SDT' ,'MatKhau', 'Quyen'], ["{$numberPhone}", "{$password}", "user"]);
                    $getIdAccount = $this->accountModel->getAccount(['MaTK'], 'SDT', $numberPhone);
                    $users = $this->userModel->insertUser(['TenKH','Email', 'MaTK'], ["{$fullName}", "{$email}", "{$getIdAccount[0]->MaTK}"]);
                        
                    if($users && $accounts) {
                        $code = 0;
                        $message = "Thêm mới khách hàng thành công.";
                    }
                    else {
                        $code = 1;
                        $message = "Lỗi! Thêm khách hàng không thành công.";
                    }
                }

                if($code == 1) {
                    header("Location: index.php?controller=user&action=index&code=$code&message=$message&full-name=$fullName&number-phone=$numberPhone&email=$email&password=$password&code2=2");
                }
                else {
                    header("Location: index.php?controller=user&action=index&code=$code&message=$message");
                }
                exit();
            }
        }

        public function show() {
            if(isset($_REQUEST['iduser']) && isset($_REQUEST['idaccount'])) {
                $idaccount = $_REQUEST['idaccount'];
                $iduser = $_REQUEST['iduser'];

                $user = $this->userModel->getUser(["*"], "MaKH", $iduser);
                $account = $this->accountModel->getAccount(["*"], "MaTK", $idaccount);

                $fullName = $user[0]->TenKH;
                $numberPhone = $account[0]->SDT;
                $email = $user[0]->Email;
                $password = $account[0]->MatKhau;

                header("Location: index.php?controller=user&action=index&iduser=$iduser&idaccount=$idaccount&full-name2=$fullName&number-phone2=$numberPhone&email2=$email&password2=$password&code2=3");
            }
            else {
                $code = 1;
                $message = "Lỗi!";
                header("Location: index.php?controller=user&action=index&code=$code&message=$message");
            }
            exit();
        }

        public function update() {
            if(isset($_REQUEST['btn-update'])) {
                if(isset($_REQUEST['iduser']) && isset($_REQUEST['idaccount'])) {
                    $idUser = $_REQUEST['iduser'];
                    $idAccount = $_REQUEST['idaccount'];
                    $fullName = $_POST['full-name'];
                    $email = $_POST['email'];
                    $numberPhone = $_POST['number-phone'];
                    $password = $_POST['password'];

                    $getByPhone = $this->accountModel->getAccountOptions(["SDT", "MaTK"], ["{$numberPhone}", "{$idAccount}"]);
                    $getByEmail = $this->userModel->getUserOptions(["Email", "MaKH"], ["{$email}", "{$idUser}"]);
                    
                    if(!empty($getByPhone)) {
                        $code = 1;
                        $message = "Số điện thoại đã tồn tại!";
                    }
                    else if(!empty($getByEmail)) {
                        $code = 1;
                        $message = "Email đã tồn tại!";
                    }
                    else {
                        $this->userModel->updateUser(['TenKH', 'Email'], ["{$fullName}", "{$email}"], 'MaKH', $idUser);
                        $this->accountModel->updateAccount(['SDT' ,'MatKhau'], ["{$numberPhone}", "{$password}"], 'MaTK', $idAccount);

                        $code = 0;
                        $message = "Sửa thông tin khách hàng $idUser thành công.";
                    }

                    if($code == 1) {
                        header("Location: index.php?controller=user&action=index&iduser=$idUser&idaccount=$idAccount&code=$code&message=$message&full-name2=$fullName&number-phone2=$numberPhone&email2=$email&password2=$password&code2=3");
                    }
                    else {
                        header("Location: index.php?controller=user&action=index&code=$code&message=$message");
                    }
                    exit();
                }
            }
        }
        
        public function delete() {
            if(isset($_REQUEST['iduser']) && isset($_REQUEST['idaccount'])) {
                $idUser = $_REQUEST['iduser'];
                $idAccount = $_REQUEST['idaccount'];

                $getCalendars = $this->calendarModel->getCalendar(['TrangThai'], 'MaKH', $idUser);
                $pendingCalendars = array_filter($getCalendars, function($calendar) {
                    return isset($calendar->TrangThai) && $calendar->TrangThai === "Đang xử lý";
                });

                if(empty($pendingCalendars)) {
                    try {
                        $this->userModel->deleteUser( $idUser, 'MaKH');
                        $this->accountModel->deleteAccount( $idAccount, 'MaTK');
                        $this->calendarModel->deleteCalendar($idUser, 'MaKH');
    
                        $code = 0;
                        $message = "Xoá khách hàng $idUser thành công.";
                    }
                    catch(Exception) {
                        $code = 1;
                        $message = "Xoá khách hàng $idUser không thành công!";
                    }
                }
                else {
                    $code = 1;
                    $message = "Xoá khách hàng $idUser không thành công do đang có lịch đặt!";
                }
            }
            else {
                $code = 1;
                $message = "Lỗi! Không thể xoá khách hàng.";
            } 

            header("Location: index.php?controller=user&action=index&code=$code&message=$message");
            exit();
        }

        public function search() {
            if(isset($_REQUEST['btn-search'])) {
                if(isset($_REQUEST['input-search'])) {
                    $input = $_REQUEST['input-search'];

                    if(ctype_digit($input)) {
                        $users = $this->userModel->searchUserAccount(['*'], ['khachhang.MaKH'], $input);
                        
                        if(empty($users)) {
                            $users = $this->accountModel->searchAccount(['*'], ['SDT'], $input);
                        }
                    }
                    else {
                        $users = $this->userModel->searchUserAccount(['*'], ['TenKH', 'Email'], $input);
                    }

                    if(!empty($users)) {
                        return $this->view("user.index",
                        [
                            'users' => $users
                        ]);
                    }
                    else {
                        $code = 1;
                        $message = "Khách hàng không tồn tại!";

                        header("Location: index.php?controller=user&action=index&code=$code&message=$message");
                        exit();
                    }
                }
            }
        }
    }
?>