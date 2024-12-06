<?php 
    class AccountModel extends BaseModel {
        const TABLE = 'taikhoan';
        const GETTABLE = 'taikhoan
                  INNER JOIN khachhang ON taikhoan.MaTK = khachhang.MaTK
                  WHERE taikhoan.Quyen != "Admin"';

        public function getAccount($columns = ['*'], $keys, $data) {
            return $this->getOption(self::TABLE, $columns, $keys, $data);
        }
    
        public function insertAccount($keys, $data) {
            return $this->insert(self::TABLE, $keys, $data);
        }

        public function getUserIdAccount($selects = ['*'], $columns = [], $option) {
            return $this->searchUser(self::GETTABLE, $selects, $columns, $option);
        }
    }