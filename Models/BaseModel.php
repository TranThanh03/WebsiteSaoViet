<?php 
class BaseModel extends Database {
    protected $connect;
    
    public function __construct() {
        $this->connect = $this->connect();
    }

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

    public function calendarLatest($table, $select = ['*'], $id, $option, $orderBy) {
        $columns = implode(', ', $select);
        $sql = "SELECT {$columns} FROM {$table} WHERE {$id} = '{$option}' $orderBy";
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

    public function searchObjectByOption($table, $selects = ['*'], $columns = [], $option) {
        $column = implode(', ', $selects);
    
        $whereClauses = [];
        foreach ($columns as $col) {
            $whereClauses[] = "{$col} LIKE '%{$option}%'";
        }
        $whereClause = implode(' OR ', $whereClauses);
        
        $sql = "SELECT {$column} FROM {$table} WHERE {$whereClause}";
        $query = $this->_query($sql);

        $data = [];
        while ($row = mysqli_fetch_object($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function searchUser($table, $selects = ['*'], $columns = [], $option) {
        $column = implode(', ', $selects);
    
        $whereClauses = [];
        foreach ($columns as $col) {
            $whereClauses[] = "{$col} LIKE '%{$option}%'";
        }
        $whereClause = implode(' OR ', $whereClauses);
        
        $sql = "SELECT {$column} FROM {$table} AND {$whereClause}";
        $query = $this->_query($sql);

        $data = [];
        while ($row = mysqli_fetch_object($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function getObjectOptions($table, $select = ['*'], $options = []) {
        $columns = implode(', ', $select);
        $sql = "SELECT {$columns} FROM {$table} WHERE {$select[0]} = '{$options[0]}' AND {$select[1]} != '{$options[1]}'";
        $query = $this->_query($sql);

        return mysqli_fetch_object($query);
    }

    public function getTaskOptions($table, $select = ['*'], $columns = [], $options = []) {
        $column = implode(', ', $select);
        $sql = "SELECT {$column} FROM {$table} WHERE {$columns[0]} = '{$options[0]}' AND {$columns[1]} != '{$options[1]}'";
        $query = $this->_query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_object($query)) {
            array_push($data, $row);
        }

        return $data;
    }

    public function taskOptions($table, $select = ['*'], $options = []) {
        $columns = implode(', ', $select);
        
        $sql = "SELECT {$columns} FROM {$table} WHERE {$select[0]} = '{$options[0]}' AND {$select[1]} = '{$options[1]}' 
                AND (
                    (NgayKH BETWEEN '{$options[2]}' AND '{$options[3]}') 
                    OR (NgayKT BETWEEN '{$options[2]}' AND '{$options[3]}')
                    OR (NgayKH <= '{$options[2]}' AND NgayKT >= '{$options[3]}')
                )";

        $query = $this->_query($sql);

        return mysqli_fetch_object($query);
    }

    public function updateStatus($table, $column, $option) {
        $sql = "UPDATE {$table} SET TrangThai = 'Đã kết thúc' WHERE {$column} < '{$option}'";
        $this->_query($sql);

        return mysqli_affected_rows($this->connect());
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

    private function _query($sql) {
        return mysqli_query($this->connect, $sql);
    }

    private function escape($value) {
        return addslashes($value);
    }

}
