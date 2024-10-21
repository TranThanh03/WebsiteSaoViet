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
            return $this->login(self::TABLE, $data, $option);
        }

        public function insertAccount($keys, $data) {
            return $this->insert(self::TABLE, $keys, $data);
        }
    
        public function updateAccount($columns, $value, $id, $option) {
            return $this->update(self::TABLE, $columns, $value, $id, $option);
        }
    }
    