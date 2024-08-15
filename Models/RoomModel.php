<?php 
    class RoomsModel extends BaseModel {
        const TABLE = 'phongkham';
        public function getById($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }
    }
?>