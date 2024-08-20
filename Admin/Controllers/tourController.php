<?php 
    class tourController extends BaseController {
        public $tourModel;
        function __construct() {
            $this->model("tourModel");
            $this->tourModel = new tourModel();
        }
        public function index() {
            $data = $this->tourModel->getAll();
            return $this->view("tour.index",
            ['data' => $data]);
        }

        public function create() {
            return $this->view('tour.create');
        }

        public function insert() {
            if (!isset($_FILES["avatar"]))
            {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }
            
            if ($_FILES["avatar"]['error'] != 0)
            {
                echo "Dữ liệu upload bị lỗi";
                die;
            }

            $target_dir    = "./public/img/tour/";
            $target_file   = $target_dir . basename($_FILES["avatar"]["name"]);
            $allowUpload   = true;

            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            $maxfilesize   = 800000;
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


            if(isset($_POST["submit"])) {
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

            if (file_exists($target_file))
            {
                echo "Tên file đã tồn tại trên server, không được ghi đè";
                $allowUpload = false;
            }
        
            if ($_FILES["avatar"]["size"] > $maxfilesize)
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
                $nameTour = $_POST['TenTour'];
                $pathImage = basename( $_FILES["avatar"]["name"]);
                $description = $_POST['MoTa'];
                $cost = $_POST['Gia'];

                $data = $this->tourModel->insertTour(
                ['TenTour', 'AnhTour','MoTa', 'Gia'], 
                ["'{$nameTour}'", "'{$pathImage}'", "'{$description}'", "'{$cost}'"]);
    
                if($data) {
                    header('location: index.php?controller=tour&action=index');
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
                $img = $this->tourModel->getTour(['AnhTour'], 'MaTour',$id);
                $pathImg = $img[0]['AnhTour'];
                $link = "public/img/tour/{$pathImg}";
                if(unlink($link)) {
                    $this->tourModel->deleteTour($id, 'MaTour');
                    header('location: index.php?controller=tour&action=index');
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
                $tour = $this->tourModel->getTour(['MaTour','TenTour','AnhTour', 'MoTa', 'Gia'], 'MaTour',$id);
                return $this->view("tour.formUpdateTour",
                [
                    'tour' => $tour
                ]);
            }
        }

        public function update() {
            $id = $_REQUEST['id'] ?? '';
            if (!isset($_FILES["input-file"]))
            {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }
            
            $target_dir    = "./public/img/tour/";
            $target_file   = $target_dir . basename($_FILES["input-file"]["name"]);
            $allowUpload   = true;

            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $maxfilesize   = 800000;
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["input-file"]["tmp_name"]);
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

            if ($_FILES["input-file"]["size"] > $maxfilesize)
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
                if (move_uploaded_file($_FILES["input-file"]["tmp_name"], $target_file))
                {
                    echo "File ". basename( $_FILES["input-file"]["name"]).
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

            echo "hii";
            if(empty($id)) {
                echo "Lỗi";
            } else {
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $img = $this->tourModel->getTour(['AnhTour'], 'MaTour', $id);
                    $imgString = $img[0]['AnhTour'];
                    if(empty(basename( $_FILES["input-file"]["name"]))) {
                        $anhTour = $imgString;
                    } else {
                        $anhTour = basename($_FILES["input-file"]["name"]);
                    }
                    $this->tourModel->updateTour(
                        ['TenTour','AnhTour','MoTa' ,'Gia'],
                        [$_POST['TenTour'],  $anhTour, $_POST['MoTa'],$_POST['Gia']], 
                        'MaTour', $id);
                    header('location: index.php?controller=tour&action=index');
                    
                } else {
                    echo 'Lỗi rồi' ;
                }
            }
        }
    }
