<?php 
    class DoctorModel extends BaseModel {
        const TABLE = 'bacsi INNER JOIN khoakham ON bacsi.MaKhoa = khoakham.MaKhoa';
        const GETTABLE = 'bacsi';
        public function getAll() {
            return $this->all(self::TABLE);
        }
        public function getById($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }
    }
?>