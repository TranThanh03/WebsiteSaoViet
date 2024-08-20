<?php 
    class userController extends BaseController {
        public $userModel;
        
        function __construct() {
            $this->model("userModel");
            $this->userModel = new userModel();
        }

        function index() {
            $dataUser = $this->userModel->getAllUser();
            $dataAccount = $this->userModel->getAllAccount();

            return $this->view("user.index",
            [
                'data' => $this->dataNormalization($dataUser, $dataAccount)
            ]);
        }

        public function dataNormalization($dataUser, $dataAccount)
        {
            $mergedData = [];

            foreach ($dataUser as $user) {
                foreach ($dataAccount as $account) {
                    if ($user['MaTK'] == $account['MaTK']) {
                        $mergedData[] = array_merge($user, $account);
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
                $username = $_POST['username'];
                $password = $_POST['password'];

                $dataAccount = $this->userModel->insertAccount(['TenTK' ,'MatKhau', 'Quyen'], ["'{$username}'", "'{$password}'", "'user'"]);
                $getIdAccount = $this->userModel->getAccount(['MaTK'], 'TenTK', $username);
                $dataUser = $this->userModel->insertUser(['TenKH','SDT','Email', 'MaTK'], ["'{$fullName}'", "'{$numberPhone}'", "'{$email}'", "'{$getIdAccount[0]['MaTK']}'"]);
                    
                if($dataUser && $dataAccount) {
                    header('location: index.php?controller=user&action=index');
                } else {
                    echo 'lỗi';
                }
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
                    ['TenKH','SDT','Email'],
                    [$_POST['full-name'],  $_POST['number-phone'], $_POST['email']], 
                    'MaKH', $idUser);

                    $this->userModel->updateAccount(
                        ['TenTK' ,'MatKhau'],
                        [$_POST['username'], $_POST['password']], 
                        'MaTK', $idAccount);

                    header('location: index.php?controller=user&action=index');
                } else {
                    echo 'Lỗi rồi' ;
                }
            }
        }
        
        public function showForm() {
            $idUser = $_REQUEST['iduser'] ?? '';
            $idAccount = $_REQUEST['idaccount'] ?? '';

            if(empty($idUser) || empty($idAccount)) {
                echo "Lỗi";
            } else {
                $dataUser = $this->userModel->getUser(
                    ['MaKH', 'TenKH','SDT', 'Email', 'MaTK'], 
                    'MaKH', $idUser);

                $dataAccount = $this->userModel->getAccount(
                    ['MaTK', 'TenTK', 'MatKhau', 'Quyen'], 
                    'MaTK', $idAccount);

                return $this->view("user.formUpdateUser",
                [
                    'data' => $this->dataNormalization($dataUser, $dataAccount)
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
                $this->userModel->deleteAccount( $idAccount, 'MaTK');
                header('location: index.php?controller=user&action=index');
            }

        }
    }

?>