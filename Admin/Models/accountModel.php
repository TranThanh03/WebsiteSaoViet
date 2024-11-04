<?php 
    class AccountModel extends BaseModel {
        const TABLE = 'taikhoan';

        const GETTABLE = 'taikhoan
                  INNER JOIN khachhang ON taikhoan.MaTK = khachhang.MaTK
                  WHERE taikhoan.Quyen != "Admin"';
    
        public function getAccount($columns = ['*'], $keys, $option) {
            return $this->getOption(self::TABLE, $columns, $keys, $option);
        }

        public function getAccountOptions($data = ['*'], $option = []) {
            return $this->getObjectOptions(self::TABLE, $data, $option);
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

        public function searchAccount($selects = ['*'], $columns = [], $option) {
            return $this->searchUser(self::GETTABLE, $selects, $columns, $option);
        }
    }
?>