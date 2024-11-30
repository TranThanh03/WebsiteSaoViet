<?php 
    class TourModel extends BaseModel {
        const TABLE = 'tour';
        
        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }

        public function getNewTour($columns=['*']) {
            return $this->all(self::TABLE . " order by MaTour desc limit 9", $columns);
        }

        public function searchTour($columns = ['*'], $id, $value) {
            return $this->search(self::TABLE, $columns, $id, $value);
        }
        
        public function getTour($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }

        public function getById($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }
    }
?>