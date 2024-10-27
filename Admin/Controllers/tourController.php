<?php 
    class tourController extends BaseController {
        public $tourModel;
        function __construct() {
            $this->model("tourModel");
            $this->tourModel = new tourModel();
        }
        public function index() {
            $dataCD = [
                [
                    'id' => 1,
                    'name' => 'Tour Biển Đảo'
                ],
                [
                    'id' => 2,
                    'name' => 'Tour Văn Hóa Lịch Sử'
                ],
                [
                    'id' => 3,
                    'name' => 'Tour Nghỉ Dưỡng'
                ],
                [
                    'id' => 4,
                    'name' => 'Tour Mạo Hiểm'
                ],
                [
                    'id' => 5,
                    'name' => 'Tour Ẩm Thực'
                ]
            ];

            $tours = $this->tourModel->getAll();
            return $this->view("tour.index",
            [
                'tours' => $tours,
                'dataCD' => $dataCD
            ]);
        }

        public function create() {
            return $this->view('tour.create');
        }

        public function insert() {
            if (!isset($_FILES["input-file"]))
            {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }
            
            if ($_FILES["input-file"]['error'] != 0)
            {
                echo "Dữ liệu upload bị lỗi";
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
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nameTour = $_POST['TenTour'];
                $dateStart = date('Y-m-d', strtotime( $_POST['NgayKH']));
                $dateEnd = date('Y-m-d', strtotime( $_POST['NgayKT']));
                $introduce = $_POST['GioiThieu'];
                $pathImage = basename( $_FILES["input-file"]["name"]);
                $description = $_POST['MoTa'];
                $cost = $_POST['Gia'];
                $maCD = $_POST['MaCD'];

                $data = $this->tourModel->insertTour(
                ['TenTour', 'NgayKH', 'NgayKT','GioiThieu', 'AnhTour','MoTa', 'Gia', 'MaCD'], 
                ["{$nameTour}", "{$dateStart}", "{$dateEnd}", "{$introduce}", "{$pathImage}", "{$description}", "{$cost}", "{$maCD}"]);
    
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
                try {
                    $img = $this->tourModel->getTour(['AnhTour'], 'MaTour',$id);
                    $pathImg = $img[0]['AnhTour'];
                    $link = "public/img/tour/{$pathImg}";
                    $this->tourModel->deleteTour($id, 'MaTour');
                    if(unlink($link)) {
                        header('location: index.php?controller=tour&action=index');
                    }else {
                        echo "Lỗi xảy ra";
                    }       
                }
                catch(Exception $e) {
                    echo "Tour này chỉ có thể chỉnh sửa, không thể xóa!";
                }
            }
        }

        public function showForm() {
            $id = $_REQUEST['id'] ?? '';
            $dataCD = [
                    [
                        'id' => 1,
                        'name' => 'Tour Biển Đảo'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Tour Văn Hóa Lịch Sử'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Tour Nghỉ Dưỡng'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Tour Mạo Hiểm'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Tour Ẩm Thực'
                    ]
                ];

            if(empty($id)) {
                echo "Lỗi";
            } else {
                $tour = $this->tourModel->getTour(['*'], 'MaTour',$id);
                return $this->view("tour.formUpdateTour",
                [
                    'tour' => $tour,
                    'dataCD' => $dataCD
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

            if(empty($id)) {
                echo "Lỗi";
            } else {
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $img = $this->tourModel->getTour(['AnhTour'], 'MaTour', $id);
                    $imgString = $img[0]->AnhTour;
                    if(empty(basename( $_FILES["input-file"]["name"]))) {
                        $anhTour = $imgString;
                    } else {
                        $anhTour = basename($_FILES["input-file"]["name"]);
                    }
                    $this->tourModel->updateTour(
                        ['TenTour', 'NgayKH', 'NgayKT', 'GioiThieu','AnhTour','MoTa' ,'Gia', 'MaCD'],
                        [$_POST['TenTour'], date('Y-m-d', strtotime( $_POST['NgayKH'])), date('Y-m-d', strtotime( $_POST['NgayKT'])), $_POST['GioiThieu'], $anhTour, $_POST['MoTa'], $_POST['Gia'], $_POST['MaCD']], 
                        'MaTour', $id);
                    header('location: index.php?controller=tour&action=index');
                    
                } else {
                    echo 'Lỗi!' ;
                }
            }
        }
    }
