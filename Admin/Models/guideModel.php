<?php 
    class GuideModel extends BaseModel {
        const TABLE = 'huongdanvien';

        public function getAll($columns = ['*']) {
            return $this->all(self::TABLE, $columns);
        }

        public function insertGuide($keys, $data)
        {
            return $this->insert(self::TABLE, $keys, $data);
        }

        public function updateGuide($columns, $value, $id, $option) {
            return $this->update(self::TABLE, $columns, $value, $id, $option);
        }

        public function getGuide($select, $id, $value) {
            return $this->getOption(self::TABLE, $select, $id, $value);
        }

        public function deleteGuide($option, $column) {
            return $this->delete(self::TABLE, $option, $column);
        }

        public function searchGuide($selects = ['*'], $columns = [], $option) {
            return $this->searchAdmin(self::TABLE, $selects, $columns, $option);
        }
    }