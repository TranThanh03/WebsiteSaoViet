<?php 
    class accountModel extends BaseModel {
        const TABLE = 'taikhoan';
    
        public function getAll($columns = ['*'], $keys, $option) {
            return $this->allAccount(self::TABLE, $columns, $keys, $option);
        }
    
        public function getAccount($columns = ['*'], $keys, $option) {
            return $this->getOption(self::TABLE, $columns, $keys, $option);
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

        public function deleteAccount($option, $id) {
            return $this->delete(self::TABLE, $option, $id);
        }
    }
?>