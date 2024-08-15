<?php 
    class roomModel extends BaseModel {
        const TABLE = 'phongkham INNER JOIN khoakham ON phongkham.MaKhoa = khoakham.MaKhoa';
        const GETTABLE = 'phongkham';

        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }

        public function insertRoom($keys, $data)
        {
            return $this->insert(self::GETTABLE, $keys, $data);
        }

        public function deleteRoom( $id, $columns) {
            return $this->delete(self::GETTABLE, $id, $columns);
        }
    }

?>