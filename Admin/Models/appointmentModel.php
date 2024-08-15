<?php 
    class appointmentModel extends BaseModel {
        const TABLE = 'khachhang INNER JOIN lichkham ON lichkham.MaKH = khachhang.MaKH 
                        INNER JOIN bacsi ON bacsi.MaBS = lichkham.MaBS 
                        INNER JOIN khoakham ON khoakham.MaKhoa = bacsi.MaKhoa
                        INNER JOIN phongkham ON phongkham.MaPhongKham = lichkham.MaPhongKham
                        INNER JOIN trangthai ON trangthai.id_Trangthai = lichkham.id_Trangthai';
        const GETTABLE = 'lichkham';
        public function getAll($columns = ["*"]) {
            return $this->all(self::TABLE, $columns);
        }

        public function updateAppointment($columns, $value, $id, $option) {
            return $this->update(self::GETTABLE, $columns, $value, $id, $option);
        }
        // public function getOptionAppointment($select = ['*'], $id, $options)
        // {
        //     return $this->getOption(self::GETTABLE, $select, $id, $options);
        // }
    }
?>