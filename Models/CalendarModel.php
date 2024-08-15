<?php 
    class CalendarModel extends BaseModel {
        const TABLE =  'lichkham INNER JOIN khachhang ON lichkham.MaKH = khachhang.MaKH 
                        INNER JOIN bacsi ON bacsi.MaBS = lichkham.MaBS 
                        INNER JOIN khoakham ON khoakham.MaKhoa = bacsi.MaKhoa
                        INNER JOIN phongkham ON phongkham.MaPhongKham = lichkham.MaPhongKham
                        INNER JOIN trangthai ON trangthai.id_Trangthai = lichkham.id_Trangthai';
        const TABLEINSERT = 'lichkham';
        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }
        public function getById($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }
        public function createCalendar($keys, $values) {
            return $this->insert(self::TABLEINSERT, $keys, $values);
        }
        public function deleteCalendar($id, $columns) {
            return $this->delete(self::TABLEINSERT, $id, $columns);
        }
    }
?>