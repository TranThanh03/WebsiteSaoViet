<?php 
    class calendarModel extends BaseModel {
        const TABLE = ' lichdat
                        INNER JOIN khachhang ON lichdat.MaKH = khachhang.MaKH
                        INNER JOIN tour ON lichdat.MaTour = tour.MaTour
                        INNER JOIN huongdanvien ON lichdat.MaHDV = huongdanvien.MaHDV';

        const GETTABLE = 'lichdat';
        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }
        public function getCalendarById($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }

        public function getCalendar($columns = ['*'], $id, $value) {
            return $this->getOption(self::GETTABLE, $columns, $id, $value);
        }

        public function createCalendar($keys, $values) {
            return $this->insert(self::GETTABLE, $keys, $values);
        }
        public function cancelCalendar($columns, $value, $id, $option) {
            return $this->update(self::GETTABLE, $columns, $value, $id, $option);
        }
    }