<?php 
    class authModel extends BaseModel{
        const TABLE = 'taikhoanadmin';
        public function loginAdmin($data = ['*'], $option=[]) {
            return $this->login(self::TABLE, $data, $option);
        }
    }
?>