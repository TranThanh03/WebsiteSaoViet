<?php 
    class BaseModel extends Database {
        //Kết nối CSDL
        protected $connect;
        public function __construct() {
            $this->connect = $this->connect();
        }

        //Lấy tất cả dữ liệu
        public function all($table, $select = ['*']) {
            $columns = implode(', ', $select);
            $sql = "SELECT {$columns} FROM {$table}" ;
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }

        //Lấy dữ liệu theo id
        public function getOption($table, $select = ['*'], $id, $options) {
            $columns = implode(', ', $select);
            $sql = "SELECT {$columns} FROM {$table} WHERE {$id} = '{$options}'" ;
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }

        //Lấy dữ liệu theo id
        public function search($table, $select = ['*'], $id, $options) {
            $columns = implode(', ', $select);
            $sql = "SELECT {$columns} FROM {$table} WHERE {$id} LIKE '%{$options}%'" ;
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }

        //Truy cập tài khoản đăng nhập
        public function login($table, $select = ['*'], $options = []) {
            $columns = implode(', ', $select);
            $sql = "SELECT {$columns} FROM {$table} WHERE {$select[0]} = '{$options[0]}' AND {$select[1]} = '{$options[1]}'" ;
            $query = $this->_query($sql);

            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
            return $data;
        }

        //Thêm dữ liệu vào bảng
        public function insert($table, $keys = [], $data=[]) {
                $columns = implode(', ', $keys);
                $values = implode(', ', $data);
                $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
                $query = $this->_query($sql);
                return $query;
        }

        //Sửa dữ liệu
        public function update($table, $columns = [], $values = [], $id, $options) {
            $setColumns = [];
            for ($i = 0; $i < count($columns); $i++) {
                $column = $columns[$i];
                $value = $this->escape($values[$i]);
                $setColumns[] = "{$column} = '{$value}'";
            }
        
            $setString = implode(', ', $setColumns);
            $sql = "UPDATE {$table} SET {$setString} WHERE {$id} = '{$options}'";
            $query = $this->_query($sql);
        
            return $query;
        }

        //Xóa dữ liệu
        public function delete($table, $options, $columns) {
            $sql = "DELETE FROM {$table}  WHERE $columns = '{$options}' " ;
            $query = $this->_query($sql);
            return $query;
        }

        private function _query($sql) {
            $query = mysqli_query($this->connect, $sql);
            return $query;
        }
        private function escape($value) {
            return addslashes($value);
        }
    }
?>