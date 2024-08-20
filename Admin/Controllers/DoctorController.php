<?php
    class DoctorController extends BaseController {
        public $doctorModel;
        public $serviceModel;
        public function __construct(){
            $this->model("doctorModel");
            $this->doctorModel = new doctorModel();

            // $this->model("serviceModel");
            // $this->serviceModel = new serviceModel();
        }
        public function index() {
            $data = $this->doctorModel->getAll(['MaBS', 'TenBS', 'sdt', 'email', 'NgaySinh', 'GioiTinh', 'bacsi.GioiThieu', 'TenKhoa', 'khoakham.MaKhoa', 'anh', 'Giakham']);
            
            return $this->view("doctor.index",
            [
                'data' => $data,
                
            ]);
        }

        public function create() {
            $services = $this->serviceModel->getAll();
            return $this->view('doctor.create',
                ["services" => $services]
            );
        }

        public function insert() {
            // Kiểm tra có dữ liệu fileupload trong $_FILES không
            // Nếu không có thì dừng
            if (!isset($_FILES["avatar"]))
            {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }
            // Kiểm tra dữ liệu có bị lỗi không
            if ($_FILES["avatar"]['error'] != 0)
            {
                echo "Dữ liệu upload bị lỗi";
                die;
            }

            //Thư mục bạn sẽ lưu file upload
            $target_dir    = "./public/img/doctor/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file   = $target_dir . basename($_FILES["avatar"]["name"]);

            $allowUpload   = true;

            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


            if(isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                if($check !== false)
                {
                    echo "Đây là file ảnh - " . $check["mime"] . ".";
                    $allowUpload = true;
                }
                else
                {
                    echo "Không phải file ảnh.";
                    $allowUpload = false;
                }
            }

            // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
            // Bạn có thể phát triển code để lưu thành một tên file khác
            if (file_exists($target_file))
            {
                echo "Tên file đã tồn tại trên server, không được ghi đè";
                $allowUpload = false;
            }
            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["avatar"]["size"] > $maxfilesize)
            {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                $allowUpload = false;
            }

            // Kiểm tra kiểu file
            if (!in_array($imageFileType,$allowtypes ))
            {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                $allowUpload = false;
            }

            if ($allowUpload)
            {
                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file))
                {
                    echo "File ". basename( $_FILES["avatar"]["name"]).
                    " Đã upload thành công.";

                    echo "File lưu tại " . $target_file;

                }
                else
                {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            }
            else
            {
                echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
            }
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $TenKH = $_POST['TenBS'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $NgaySinh = $_POST['NgaySinh'];
                $GioiTinh = $_POST['GioiTinh'];
                $MaKhoa = $_POST['MaKhoa'];
                $GiaKham = $_POST['GiaKham'];
                $GioiThieu = $_POST['GioiThieu'];


                $anh = basename( $_FILES["avatar"]["name"]);
                $data = $this->doctorModel->insertDoctor(
                ['TenBS','sdt','email' ,'NgaySinh' ,'GioiTinh', 'MaKhoa', 'anh', 'GiaKham', 'GioiThieu'], 
                ["'{$TenKH}'", "'{$sdt}'", "'{$email}'", "'{$NgaySinh}'", "'{$GioiTinh}'", "'{$MaKhoa}'", "'{$anh}'", "'{$GiaKham}'", "'{$GioiThieu}'"]);
    
                if($data) {
                    header('location: index.php?controller=doctor&action=index');
                } else {
                    echo 'lỗi';
                }
            }
        }

        public function update() {
            $id = $_REQUEST['id'] ?? '';
            if (!isset($_FILES["avatarUpdate"]))
            {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }
    
            $target_dir    = "./public/img/doctor/";
            $target_file   = $target_dir . basename($_FILES["avatarUpdate"]["name"]);
            $allowUpload   = true;

            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $maxfilesize   = 800000;

            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["avatarUpdate"]["tmp_name"]);
                if($check !== false)
                {
                    $allowUpload = true;
                }
                else
                {
                    echo "Không phải file ảnh.";
                    $allowUpload = false;
                }
            }

            if ($_FILES["avatarUpdate"]["size"] > $maxfilesize)
            {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                $allowUpload = false;
            }

            if (!in_array($imageFileType,$allowtypes ))
            {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                $allowUpload = false;
            }

            if ($allowUpload)
            {
                if (move_uploaded_file($_FILES["avatarUpdate"]["tmp_name"], $target_file))
                {
                    echo "File ". basename( $_FILES["avatarUpdate"]["name"]).
                    " Đã upload thành công.";

                    echo "File lưu tại " . $target_file;

                }
                else
                {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            }
            else
            {
                echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
            }

            
            if(empty($id)) {
                echo "Lỗi";
            } else {

                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $img = $this->doctorModel->getDoctor(['anh'], 'MaBS', $id);
                    $imgString = $img[0]['anh'];
                    if(empty(basename( $_FILES["avatarUpdate"]["name"]))) {
                        $anh = $imgString;
                    } else {
                        $anh = basename( $_FILES["avatarUpdate"]["name"]);
                    }
                    $this->doctorModel->updateDoctor(
                        ['TenBS','sdt','email' ,'NgaySinh' ,'GioiTinh', 'MaKhoa', 'anh', 'GiaKham', 'GioiThieu'],
                        [$_POST['TenBS'],  $_POST['sdt'], $_POST['email'],$_POST['NgaySinh'], $_POST['GioiTinh'], $_POST['MaKhoa'], $anh, $_POST['GiaKham'], $_POST['GioiThieu']], 
                    'MaBS', $id);
                    header('location: index.php?controller=doctor&action=index');
                    
                } else {
                    echo 'Lỗi rồi' ;
                }
            }
        }
        
        public function showForm() {
            $id = $_REQUEST['id'] ?? '';

            if(empty($id)) {
                echo "Lỗi";
            } else {
                $data = $this->doctorModel->getDoctor( 
                ['MaBS', 'TenBS','sdt', 'email', 'NgaySinh', 'GioiTinh', 'MaKhoa', 'anh', 'GiaKham', 'GioiThieu'], 
                'MaBS', $id);
                $services = $this->serviceModel->getAll();
                return $this->view("doctor.formUpdatedoctor",
                [
                    'data' => $data,
                    'services' => $services
                ]);
            }
        }

        public function delete() {
            $id = $_REQUEST['id'] ?? '';

            if(empty($id)) {
                echo "Lỗi";
            } else {
                $img = $this->doctorModel->getDoctor(['anh'], 'MaBS', $id);
                $imgString = $img[0]['anh'];
                $link = "public/img/doctor/{$imgString}";
                if(unlink($link)) {
                    $this->doctorModel->deleteDoctor($id, 'MaBS');
                    header('location: index.php?controller=doctor&action=index');
                }else {
                    echo "Lỗi xảy ra";
                }
                
            }

        }
    }
?>