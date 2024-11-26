<?php 
    class AccountModel extends BaseModel {
        const TABLE = 'taikhoan';
        
        const GETTABLE = 'taikhoan
                  INNER JOIN khachhang ON taikhoan.MaTK = khachhang.MaTK
                  WHERE taikhoan.Quyen != "Admin"';
                  
        public function getAccount($columns = ['*'], $keys, $data) {
            return $this->getOption(self::TABLE, $columns, $keys, $data);
        }
    
        public function loginAccount($data = ['*'], $option = []) {
            return $this->login(self::TABLE, $data, $option);
        }

        public function insertAccount($keys, $data) {
            return $this->insert(self::TABLE, $keys, $data);
        }
    }

    