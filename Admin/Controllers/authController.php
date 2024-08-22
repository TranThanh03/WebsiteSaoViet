<?php
    class authController extends BaseController {
        
        public function index() {
            if(empty($_SESSION['accountAdmin']) && empty($_SESSION['passwordAdmin'])) {
                return header('location: /WebsiteSaoViet/index.php?controller=home&action=index' );
            }
        }

        public function logout() {
            unset($_SESSION['accountAdmin']);
            unset($_SESSION['passwordAdmin']);
            header('location: /WebsiteSaoViet/index.php?controller=home&action=index');
        }
    }