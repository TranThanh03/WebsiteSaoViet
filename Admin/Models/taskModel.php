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

        public function insertTask($keys, $data)
        {
            return $this->insert(self::GETTABLE, $keys, $data);
        }

        public function deleteTask( $id, $columns) {
            return $this->delete(self::GETTABLE, $id, $columns);
        }
    }
?>