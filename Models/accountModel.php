<?php 
    class accountModel extends BaseModel {
        const TABLE = 'taikhoan';
    
        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }
    
        public function getAccount($columns = ['*'], $keys, $data) {
            return $this->getOption(self::TABLE, $columns, $keys, $data);
        }
    
        public function loginAccount($data = ['*'], $option = []) {
            return $this->optionObject(self::TABLE, $data, $option);
        }
    }

    