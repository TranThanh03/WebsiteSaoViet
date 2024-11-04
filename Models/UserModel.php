<?php 
    class UserModel extends BaseModel {
        const TABLE = 'khachhang';
    
        public function getUser($columns = ['*'], $keys, $data) {
            return $this->getOption(self::TABLE, $columns, $keys, $data);
        }
    
        public function insertUser($keys, $data) {
            return $this->insert(self::TABLE, $keys, $data);
        }
    
        public function updateUser($columns, $value, $id, $option) {
            return $this->update(self::TABLE, $columns, $value, $id, $option);
        }
    }
    