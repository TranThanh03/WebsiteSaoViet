<?php 
    class appointmentController extends BaseController {
        public $appointmentModel;
        public $userModel;
        public function __construct() {
            $this->model("appointmentModel");
            $this->appointmentModel = new appointmentModel();
            $this->model("userModel");
            $this->userModel = new userModel();
        }

        public function index() {
            $data = $this->appointmentModel->getAll([
                'MaLichKham', 'ThoiGianDat', 'ThoiGianKham', 'NoiDungKham', 'GhiChu', 'TenKH', 'TenPhongKham', 'TenBS', 'lichkham.id_TrangThai', 'TenTrangThai', 'TenKhoa'
            ]);
            return $this->view("appointment.index",
            ['data' => $data]);
        }

        public function update() {
            $id = $_REQUEST['id'] ?? '';
            $status = $_REQUEST['status'] ?? '';
            if(empty($id) || empty($status)) {
                echo "Lỗi";
            } else {

                // $maKH = $this->appointmentModel->getOptionAppointment(['MaKH'], "MaLichKham", $id);
                // $khachHang = $this->userModel->getUser(["email","TenKH"],"MaKH", $maKH['0']["MaKH"]);
                // $to      = $khachHang['0']["email"];
                // $subject = "";
                // $message = "";
                // $header  =  "";
                // $header .=  "";

                if($status === 'confirm') {
                    // $subject = "Thông báo đặt lịch thành công";
                    // $message = "Lịch khám của bệnh nhân {$khachHang['0']['TenKH']} đã đặt thành công";
                    $this->appointmentModel->updateAppointment(
                    ['id_TrangThai'], ['2']
                    , 'MaLichKham', $id);
                } else {
                    // $subject = "Thông báo đặt lịch không thành công";
                    // $message = "Lịch khám của bệnh nhân {$khachHang['0']['TenKH']} không được đặt do một số lý do";
                    $this->appointmentModel->updateAppointment(
                    ['id_TrangThai'], ['3']
                    , 'MaLichKham', $id);
                }
                header('location: index.php?controller=appointment&action=index');
                // if(mail($to,$subject,$message,$header)) {
                    
                // } else {
                //     echo 'Lỗi rồi' ;
                // };
            }
        }
    }
?>