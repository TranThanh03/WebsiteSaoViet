<?php 
    class homeController extends BaseController {
        public function index() {
            // if(!empty($_SESSION['name'])) {
            //     return $this->view("home.index");
            // }
            // return $this->view("login.index");

            return $this->view("home.index");
        }
    }
?>