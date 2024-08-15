<?php 
    class serviceModel extends BaseModel {
        const TABLE = 'khoakham';
        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }

        public function insertservice($keys, $data)
        {
            return $this->insert(self::TABLE, $keys, $data);
        }

        public function getServic($select, $id, $value) {
            return $this->getOption(self::TABLE, $select, $id, $value);
        }

        public function deleteservice( $id, $columns) {
            return $this->delete(self::TABLE, $id, $columns);
        }
    }
?>