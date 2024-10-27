<?php
    class TaskModel extends BaseModel {
        const TABLE = 'phancong';
        
        public function getAll() {
            return $this->all(self::TABLE);
        }
        public function getTask($columns = ['*'], $id, $value) {
            return $this->getOption(self::TABLE, $columns, $id, $value);
        }

        public function getTaskOption($data = ['*'], $option = []) {
            return $this->optionObject(self::TABLE, $data, $option);
        }
    }
?>