<?php 
class BaseModel extends Database {
    protected $connect;
    
    public function __construct() {
        $this->connect = $this->connect();
    }

    // Lấy tất cả dữ liệu theo kiểu đối tượng
    public function all($table, $select = ['*']) {
        $columns = implode(', ', $select);
        $sql = "SELECT {$columns} FROM {$table}";
        $query = $this->_query($sql);

        $data = [];
        while ($row = mysqli_fetch_object($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    // Lấy dữ liệu theo ID dưới dạng đối tượng
    public function getOption($table, $select = ['*'], $id, $option) {
        $columns = implode(', ', $select);
        $sql = "SELECT {$columns} FROM {$table} WHERE {$id} = '{$option}'";
        $query = $this->_query($sql);

        $data = [];
        while ($row = mysqli_fetch_object($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    // Tìm kiếm dữ liệu với LIKE dưới dạng đối tượng
    public function search($table, $select = ['*'], $id, $option) {
        $columns = implode(', ', $select);
        $sql = "SELECT {$columns} FROM {$table} WHERE {$id} LIKE '%{$option}%'";
        $query = $this->_query($sql);

        $data = [];
        while ($row = mysqli_fetch_object($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    // Đăng nhập dưới dạng đối tượng
    public function optionObject($table, $select = ['*'], $options = []) {
        $columns = implode(', ', $select);
        $sql = "SELECT {$columns} FROM {$table} WHERE {$select[0]} = '{$options[0]}' AND {$select[1]} = '{$options[1]}'";
        $query = $this->_query($sql);

        return mysqli_fetch_object($query);
    }

    // Thêm dữ liệu
    public function insert($table, $keys = [], $data = []) {
        $columns = implode(', ', $keys);
        $values = implode(', ', array_map(function($val) {
            return "'" . $this->escape($val) . "'";
        }, $data));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        return $this->_query($sql);
    }

    // Sửa dữ liệu
    public function update($table, $columns = [], $values = [], $id, $option) {
        $setColumns = [];
        for ($i = 0; $i < count($columns); $i++) {
            $column = $columns[$i];
            $value = $this->escape($values[$i]);
            $setColumns[] = "{$column} = '{$value}'";
        }

        $setString = implode(', ', $setColumns);
        $sql = "UPDATE {$table} SET {$setString} WHERE {$id} = '{$option}'";
        return $this->_query($sql);
    }

    // Xóa dữ liệu
    public function delete($table, $option, $column) {
        $sql = "DELETE FROM {$table} WHERE {$column} = '{$option}'";
        return $this->_query($sql);
    }

    public function allAccount($table, $select = ['*'], $id, $option) {
        $columns = implode(', ', $select);
        $sql = "SELECT {$columns} FROM {$table} WHERE {$id} != '{$option}'";
        $query = $this->_query($sql);

        $data = [];
        while ($row = mysqli_fetch_object($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    private function _query($sql) {
        return mysqli_query($this->connect, $sql);
    }

    private function escape($value) {
        return addslashes($value);
    }

}
