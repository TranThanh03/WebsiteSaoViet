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
            $getIdAcc = $this->userModel->getUser(['MaTK'], 'Email', $_SESSION['username']);
            $user = $this->userModel->getUserByUsername(['*'], ['khachhang.MaTK'], $getIdAcc[0]->MaTK);
            
            return $this->view("user.index",
                [
                    'user' => $user
                ]
            );
        }
    }