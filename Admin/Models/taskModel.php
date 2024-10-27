<?php
    class TaskModel extends BaseModel {
        const TABLE = 'phancong';
        
        public function getAll() {
            return $this->all(self::TABLE);
        }
        public function getTask($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }

        public function insertTask($keys, $data)
        {
            return $this->insert(self::TABLE, $keys, $data);
        }

        public function deleteTask( $id, $columns) {
            return $this->delete(self::TABLE, $id, $columns);
        }
    }
?>