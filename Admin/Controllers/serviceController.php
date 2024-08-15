<?php 
    class serviceController extends BaseController {
        public $serviceModel;
        function __construct() {
            $this->model("serviceModel");
            $this->serviceModel = new serviceModel();
        }
        public function index() {
            $data = $this->serviceModel->getAll();
            return $this->view("service.index",
            ['data' => $data]);
        }

        public function create() {
            return $this->view('service.create');
        }

        public function insert() {
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
            $target_dir    = "./public/img/service/";
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
                $TenKhoa = $_POST['TenKhoa'];
                $GioiThieu = $_POST['MoTa'];
                $anh = basename( $_FILES["avatar"]["name"]);
                $data = $this->serviceModel->insertservice(
                ['TenKhoa', 'HinhAnh','GioiThieu'], 
                ["'{$TenKhoa}'", "'{$anh}'", "'{$GioiThieu}'",]);
    
                if($data) {
                    header('location: index.php?controller=service&action=index');
                } else {
                    echo 'lỗi';
                }
            }
        }

        public function delete() {
            $id = $_REQUEST['id'] ?? '';
            if(empty($id)) {
                echo "Lỗi";
            } else {
                $img = $this->serviceModel->getServic(['HinhAnh'], 'MaKhoa',$id);
                $imgString = $img[0]['HinhAnh'];
                $link = "public/img/service/{$imgString}";
                if(unlink($link)) {
                    $this->serviceModel->deleteservice($id, 'MaKhoa');
                    header('location: index.php?controller=service&action=index');
                }else {
                    echo "Lỗi xảy ra";
                }
                
                
            }

        }
        public function showForm() {
            $id = $_REQUEST['id'] ?? '';

            if(empty($id)) {
                echo "Lỗi";
            } else {
                $services = $this->serviceModel->getServic(['MaKhoa','TenKhoa','GioiThieu'], 'MaKhoa',$id);
                return $this->view("service.formUpdateService",
                [
                    'services' => $services
                ]);
            }
        }
    }

?>