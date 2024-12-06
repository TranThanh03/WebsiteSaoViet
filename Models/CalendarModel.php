<?php 
    class CalendarModel extends BaseModel {
        const TABLE = 'dondat';
    
        public function getCalendarById($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }

        public function getCalendar($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }

        public function createCalendar($keys, $values) {
            return $this->insert(self::TABLE, $keys, $values);
        }
        public function cancelCalendar($columns, $value, $id, $option) {
            return $this->update(self::TABLE, $columns, $value, $id, $option);
        }
    }