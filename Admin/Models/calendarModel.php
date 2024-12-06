<?php 
    class CalendarModel extends BaseModel {
        const TABLE = ' dondat
                        INNER JOIN khachhang ON dondat.MaKH = khachhang.MaKH
                        INNER JOIN tour ON dondat.MaTour = tour.MaTour
                        INNER JOIN huongdanvien ON dondat.MaHDV = huongdanvien.MaHDV';
        const GETTABLE = 'dondat';
        public function getAll($columns = ["*"]) {
            return $this->all(self::GETTABLE, $columns);
        }

        public function getCalendar($select, $id, $value) {
            return $this->getOption(self::GETTABLE, $select, $id, $value);
        }

        public function getCalendarLatest($select, $id, $option, $orderBy) {
            return $this->calendarLatest(self::TABLE, $select, $id, $option, $orderBy);
        }

        public function updateCalendar($columns, $value, $id, $option) {
            return $this->update(self::GETTABLE, $columns, $value, $id, $option);
        }

        public function deleteCalendar($option, $column) {
            return $this->delete(self::GETTABLE,  $option, $column);
        }

        public function searchCalendar($selects = ['*'], $columns = [], $option) {
            return $this->searchObjectByOption(self::GETTABLE, $selects, $columns, $option);
        }
    }