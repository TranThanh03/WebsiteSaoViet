<?php 
    class userController extends BaseController {
        public $userModel;
        public $accountModel;
        
        function __construct() {
            $this->model("userModel");
            $this->userModel = new userModel();

            $this->model("accountModel");
            $this->accountModel = new accountModel();
        }

        function index() {
            $users = $this->userModel->getAll();
            $accounts = $this->accountModel->getAll(['*'], 'Quyen', 'admin');

            return $this->view("user.index",
            [
                'users' => $this->dataNormalization($users, $accounts)
            ]);
        }

        public function dataNormalization($dataUser, $dataAccount)
        {
            $mergedData = [];

            foreach ($dataUser as $user) {
                foreach ($dataAccount as $account) {
                    if ($user->MaTK == $account->MaTK) {
                        $mergedObject = new stdClass();
                        
                        foreach ($user as $key => $value) {
                            $mergedObject->$key = $value;
                        }
                        
                        foreach ($account as $key => $value) {
                            $mergedObject->$key = $value;
                        }

                        $mergedData[] = $mergedObject;
                    }
                }
            }

            return $mergedData;
        }

        public function insert() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fullName = $_POST['full-name'];
                $numberPhone = $_POST['number-phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $getByPhone = $this->accountModel->getAccount(['MaTK'], 'SDT', $numberPhone);
                $getByEmail = $this->userModel->getUser(['MaTK'], 'Email', $email);
                
                if(!empty($getByPhone)) {
                    echo "<script>alert('Số điện thoại đã tồn tại!')</script>";
                }
                else if(!empty($getByEmail)) {
                    echo "<script>alert('Email đã tồn tại!')</script>";
                }
                else {
                    $accounts = $this->accountModel->insertAccount(['SDT' ,'MatKhau', 'Quyen'], ["{$numberPhone}", "{$password}", "user"]);
                    $getIdAccount = $this->accountModel->getAccount(['MaTK'], 'SDT', $numberPhone);
                    $users = $this->userModel->insertUser(['TenKH','Email', 'MaTK'], ["{$fullName}", "{$email}", "{$getIdAccount[0]->MaTK}"]);
                        
                    if($users && $accounts) {
                        echo "<script>alert('Thêm khách hàng thành công.')</script>";
                    }
                    else {
                        echo "<script>alert('Lỗi! Thêm khách hàng không thành công.')</script>";
                    }
                }
                echo "<script>window.location.href = 'index.php?controller=user&action=index'</script>";
            }
        }

        public function update() {
            $idUser = $_REQUEST['iduser'] ?? '';
            $idAccount = $_REQUEST['idaccount'] ?? '';

            if(empty($idUser) || empty($idAccount)) {
                echo "Lỗi";
            } else {
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->userModel->updateUser(
                    ['TenKH', 'Email'],
                    [$_POST['full-name'], $_POST['email']], 
                    'MaKH', $idUser);

                    $this->accountModel->updateAccount(
                        ['SDT' ,'MatKhau'],
                        [$_POST['number-phone'], $_POST['password']], 
                        'MaTK', $idAccount);

                    header('location: index.php?controller=user&action=index');
                } else {
                    echo 'Lỗi!' ;
                }
            }
        }
        
        public function showForm() {
            $idUser = $_REQUEST['iduser'] ?? '';
            $idAccount = $_REQUEST['idaccount'] ?? '';

            if(empty($idUser) || empty($idAccount)) {
                echo "Lỗi!";
            } else {
                $users = $this->userModel->getUser(
                    ['MaKH', 'TenKH', 'Email', 'MaTK'], 
                    'MaKH', $idUser);

                $accounts = $this->accountModel->getAccount(
                    ['MaTK', 'SDT', 'MatKhau'], 
                    'MaTK', $idAccount);

                return $this->view("user.formUpdateUser",
                [
                    'users' => $this->dataNormalization($users, $accounts)
                ]
                );
            }
        }

        public function delete() {
            $idUser = $_REQUEST['iduser'] ?? '';
            $idAccount = $_REQUEST['idaccount'] ?? '';

            if(empty($idUser) || empty($idAccount)) {
                echo "Lỗi";
            } else {
                $this->userModel->deleteUser( $idUser, 'MaKH');
                $this->accountModel->deleteAccount( $idAccount, 'MaTK');
                header('location: index.php?controller=user&action=index');
            }

        }
    }

?>