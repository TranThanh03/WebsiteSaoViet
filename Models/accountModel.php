<?php 
    class AccountModel extends BaseModel {
        const TABLE = 'taikhoan';
    
        public function getAccount($columns = ['*'], $keys, $data) {
            return $this->getOption(self::TABLE, $columns, $keys, $data);
        }
    
        public function loginAccount($data = ['*'], $option = []) {
            return $this->login(self::TABLE, $data, $option);
        }
    }

    