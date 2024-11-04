<?php 
    class TourModel extends BaseModel {
        const TABLE = 'tour';

        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }

        public function insertTour($keys, $data)
        {
            return $this->insert(self::TABLE, $keys, $data);
        }

        public function updateTour($columns, $value, $id, $option) {
            return $this->update(self::TABLE, $columns, $value, $id, $option);
        }

        public function getTour($select, $id, $value) {
            return $this->getOption(self::TABLE, $select, $id, $value);
        }

        public function deleteTour($option, $column) {
            return $this->delete(self::TABLE,$option, $column);
        }

        public function searchTour($selects = ['*'], $columns = [], $option) {
            return $this->searchAdmin(self::TABLE, $selects, $columns, $option);
        }
    }
?>