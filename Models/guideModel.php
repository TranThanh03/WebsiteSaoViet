<?php 
    class guideModel extends BaseModel {
        const TABLE = 'huongdanvien';
        
        public function getAll() {
            return $this->all(self::TABLE);
        }
        public function getGuide($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }
    }