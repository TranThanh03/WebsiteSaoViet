<?php 
    class userModel extends BaseModel {
        const TABLE_USER = 'khachhang';
        const TABLE_ACCOUNT = 'taikhoan';
    
        // Phương thức lấy dữ liệu từ một bảng cụ thể
        public function getFromTable($table, $columns = ['*']) {
            return $this->all($table, $columns);
        }
    
        public function getAll($columns = ['*'], $table = self::TABLE_USER) {
            return $this->getFromTable($table, $columns);
        }
    
        // Phương thức lấy dữ liệu người dùng từ một bảng cụ thể
        public function getUserFromTable($table, $columns = ['*'], $keys, $data) {
            return $this->getOption($table, $columns, $keys, $data);
        }
    
        public function getUser($columns = ['*'], $keys, $data, $table = self::TABLE_USER) {
            return $this->getUserFromTable($table, $columns, $keys, $data);
        }
    
        // Phương thức đăng nhập người dùng từ một bảng cụ thể
        public function loginUserFromTable($table, $data = ['*'], $option = []) {
            return $this->login($table, $data, $option);
        }
    
        public function loginUser($data = ['*'], $option = [], $table = self::TABLE_USER) {
            return $this->loginUserFromTable($table, $data, $option);
        }
    
        // Phương thức chèn dữ liệu người dùng vào một bảng cụ thể
        public function insertUserToTable($table, $keys, $data) {
            return $this->insert($table, $keys, $data);
        }
    
        public function insertUser($keys, $data, $table = self::TABLE_USER) {
            return $this->insertUserToTable($table, $keys, $data);
        }
    
        // Phương thức cập nhật dữ liệu người dùng trong một bảng cụ thể
        public function updateUserInTable($table, $columns, $value, $id, $option) {
            return $this->update($table, $columns, $value, $id, $option);
        }
    
        public function updateUser($columns, $value, $id, $option, $table = self::TABLE_USER) {
            return $this->updateUserInTable($table, $columns, $value, $id, $option);
        }
    }
    