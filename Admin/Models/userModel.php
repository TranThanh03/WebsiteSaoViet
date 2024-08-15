<?php 
    class userModel extends BaseModel {
        const TABLE = 'khachhang';
        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }

        public function insertUser($keys, $data)
        {
            return $this->insert(self::TABLE, $keys, $data);
        }

        public function updateUser($columns, $value, $id, $option) {
            return $this->update(self::TABLE, $columns, $value, $id, $option);
        }

        public function getUser($select, $id, $value) {
            return $this->getOption(self::TABLE, $select, $id, $value);
        }

        public function deleteUser($id, $columns) {
            return $this->delete(self::TABLE, $id, $columns);
        }
    }
?>