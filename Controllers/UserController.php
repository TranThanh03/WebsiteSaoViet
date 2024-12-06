<?php 
    class UserController extends BaseController {
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
            $getIdAcc = $this->accountModel->getAccount(['MaTK'], 'SDT', $_SESSION['username']);
            $user = $this->accountModel->getUserIdAccount(['*'], ['taikhoan.MaTK'], $getIdAcc[0]->MaTK);
            
            return $this->view("user.index",
                [
                    'user' => $user
                ]
            );
        }
    }