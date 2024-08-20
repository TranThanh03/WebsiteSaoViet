<?php 
    class userModel extends BaseModel {
        const TABLE_USER = 'khachhang';
        const TABLE_ACCOUNT = 'taikhoan';

        public function getAllUser($columns = ['*']) {
            return $this->all(self::TABLE_USER, $columns);
        }

        public function getAllAccount($columns = ['*']) {
            return $this->all(self::TABLE_ACCOUNT, $columns);
        }

        public function insertUser($keys, $data) {
            return $this->insert(self::TABLE_USER, $keys, $data);
        }

        public function insertAccount($keys, $data) {
            return $this->insert(self::TABLE_ACCOUNT, $keys, $data);
        }

        public function updateUser($columns, $value, $id, $option) {
            return $this->update(self::TABLE_USER, $columns, $value, $id, $option);
        }

        public function updateAccount($columns, $value, $id, $option) {
            return $this->update(self::TABLE_ACCOUNT, $columns, $value, $id, $option);
        }

        public function getUser($select, $id, $value) {
            return $this->getOption(self::TABLE_USER, $select, $id, $value);
        }

        public function getAccount($select, $id, $value) {
            return $this->getOption(self::TABLE_ACCOUNT, $select, $id, $value);
        }

        public function deleteUser($id, $columns) {
            return $this->delete(self::TABLE_USER, $id, $columns);
        }

        public function deleteAccount($id, $columns) {
            return $this->delete(self::TABLE_ACCOUNT, $id, $columns);
        }
    }
?>
