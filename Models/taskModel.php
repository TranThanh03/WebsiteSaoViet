<?php
    class TaskModel extends BaseModel {
        const GETTABLE = ' phancong
                            INNER JOIN tour ON phancong.MaTour = tour.MaTour
                            INNER JOIN huongdanvien ON phancong.MaHDV = huongdanvien.MaHDV';
        
        public function getTask($select = ['*'], $columns = [], $options = []) {
            return $this->getTaskOptions(self::GETTABLE,$select, $columns, $options);
        }

        public function updateTask($column, $option)
        {
            return $this->updateStatus(self::GETTABLE, $column, $option);
        }
    }
?>