<?php 
    class UserModel extends BaseModel {
        const TABLE = 'khachhang';
        const GETTABLE = 'khachhang
                  INNER JOIN taikhoan ON khachhang.MaTK = taikhoan.MaTK
                  WHERE taikhoan.Quyen != "Admin"';
    
        public function getAll($columns = ['*']) {
            return $this->all(self::GETTABLE, $columns);
        }
    
        public function getUser($columns = ['*'], $keys, $data) {
            return $this->getOption(self::TABLE, $columns, $keys, $data);
        }
        
        public function getUserOptions($data = ['*'], $option = []) {
            return $this->getObjectOptions(self::TABLE, $data, $option);
        }

        public function insertUser($keys, $data) {
            return $this->insert(self::TABLE, $keys, $data);
        }
    
        public function updateUser($columns, $value, $id, $option) {
            return $this->update(self::TABLE, $columns, $value, $id, $option);
        }

        public function deleteUser($option, $id) {
            return $this->delete(self::TABLE, $option, $id);
        }

        public function searchUserAccount($selects = ['*'], $columns = [], $option) {
            return $this->searchUser(self::GETTABLE, $selects, $columns, $option);
        }
    }
?>