<?php 
    class UserModel extends BaseModel {
        const TABLE = 'khachhang';

        const GETTABLE = 'khachhang
                  INNER JOIN taikhoan ON khachhang.MaTK = taikhoan.MaTK
                  WHERE taikhoan.Quyen != "Admin"';
    
        public function getUser($columns = ['*'], $keys, $data) {
            return $this->getOption(self::TABLE, $columns, $keys, $data);
        }
    
        public function insertUser($keys, $data) {
            return $this->insert(self::TABLE, $keys, $data);
        }

        public function getUserByUsername($selects = ['*'], $columns = [], $option) {
            return $this->searchUser(self::GETTABLE, $selects, $columns, $option);
        }
    }
    