<?php
    class authController extends BaseController {
        
        public function logout() {
            unset($_SESSION['accountAdmin']);
            unset($_SESSION['passwordAdmin']);
            header('location: /DuLichSaoViet/index.php?controller=home&action=index' );
        }
    }
?>