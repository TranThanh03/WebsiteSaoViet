<?php 
    class ListModel extends BaseModel {
        const TABLE = 'bacsi';
        public function getById($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }
    }
?>