<?php
    class TaskModel extends BaseModel {
        const TABLE = ' phancong
                        INNER JOIN tour ON phancong.MaTour = tour.MaTour
                        INNER JOIN huongdanvien ON phancong.MaHDV = huongdanvien.MaHDV';
        const GETTABLE = 'phancong';
        
        public function getAll() {
            return $this->all(self::TABLE);
        }
        public function getTask($columns = ['*'], $id, $value) {
            return $this->getOption(self::GETTABLE, $columns, $id, $value);
        }

        public function getTaskOptions($data = ['*'], $option = []) {
            return $this->taskOptions(self::GETTABLE, $data, $option);
        }

        public function insertTask($keys, $data)
        {
            return $this->insert(self::GETTABLE, $keys, $data);
        }

        public function deleteTask($option, $column)
        {
            return $this->delete(self::GETTABLE, $option, $column);
        }
    }
?>