<?php 
    class CalendarModel extends BaseModel {
        const TABLE = ' lichdat
                        INNER JOIN khachhang ON lichdat.MaKH = khachhang.MaKH
                        INNER JOIN tour ON lichdat.MaTour = tour.MaTour
                        INNER JOIN huongdanvien ON lichdat.MaHDV = huongdanvien.MaHDV';
        const GETTABLE = 'lichdat';
        public function getAll($columns = ["*"]) {
            return $this->all(self::TABLE, $columns);
        }

        public function getCalendar($select, $id, $value) {
            return $this->getOption(self::GETTABLE, $select, $id, $value);
        }

        public function updateCalendar($columns, $value, $id, $option) {
            return $this->update(self::GETTABLE, $columns, $value, $id, $option);
        }

        public function deleteCalendar($option, $column) {
            return $this->delete(self::GETTABLE,  $option, $column);
        }
    }