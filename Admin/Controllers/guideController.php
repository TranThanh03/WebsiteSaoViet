<?php
    class guideController extends BaseController {
        public $guideModel;
        public $tourModel;
        public function __construct(){
            $this->model("guideModel");
            $this->guideModel = new guideModel();
            $this->model("tourModel");
            $this->tourModel = new tourModel();
        }
        public function index() {
            $data = $this->guideModel->getAll(['*']);
            return $this->view("guide.index",
            [
                'data' => $data
            ]);
        }

        public function create() {
            $dataTour = $this->tourModel->getAll();
                
            return $this->view("guide.create",
            [
                'dataTour' => $dataTour
            ]);
        }

        public function insert() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $TenHDV = $_POST['TenHDV'];
                $SDT = $_POST['SDT'];
                $Email = $_POST['Email'];
                $NgaySinh = $_POST['NgaySinh'];
                $GioiTinh = $_POST['GioiTinh'];
                $MaTour = $_POST['MaTour'];
                $Gia = $_POST['Gia'];
                $MoTa = $_POST['MoTa'];
                $DanhGia = $_POST['DanhGia'];

                if($MaTour == 0) {
                    echo "Lỗi! Hãy chọn tour trước.";
                    
                }
                else {
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

                    $target_dir    = "./public/img/guide/";
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
                        if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file))
                        {
                            echo "Có lỗi xảy ra khi upload file.";
                        }
                    }
                    else
                    {
                        echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
                    }
                    
                    $anh = basename( $_FILES["avatar"]["name"]);
                    $dataGuide = $this->guideModel->insertGuide(
                        ['TenHDV','SDT','Email' ,'NgaySinh' ,'GioiTinh', 'AnhHDV', 'Gia', 'MoTa', 'DanhGia', 'MaTour'], 
                        ["'{$TenHDV}'", "'{$SDT}'", "'{$Email}'", "'{$NgaySinh}'", "'{$GioiTinh}'", "'{$anh}'", "'{$Gia}'", "'{$MoTa}'", "'{$DanhGia}'", "'{$MaTour}'"]);
        
                    if($dataGuide) {
                        header('location: index.php?controller=guide&action=index');
                    } else {
                        echo 'lỗi';
                    }
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
    
            $target_dir    = "./public/img/guide/";
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
                if (!move_uploaded_file($_FILES["avatarUpdate"]["tmp_name"], $target_file))
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
                    $img = $this->guideModel->getGuide(['AnhHDV'], 'MaHDV', $id);
                    $imgString = $img[0]['AnhHDV'];
                    if(empty(basename( $_FILES["avatarUpdate"]["name"]))) {
                        $anh = $imgString;
                    } else {
                        $anh = basename( $_FILES["avatarUpdate"]["name"]);
                    }
                    
                    $this->guideModel->updateGuide(
                        ['TenHDV','SDT','Email' ,'NgaySinh' ,'GioiTinh', 'AnhHDV', 'Gia', 'MoTa', 'DanhGia', 'MaTour'],
                        [$_POST['TenHDV'],  $_POST['SDT'], $_POST['Email'],$_POST['NgaySinh'], $_POST['GioiTinh'], $anh, $_POST['Gia'], $_POST['MoTa'], $_POST['DanhGia'], $_POST['MaTour']], 
                        'MaHDV', $id);

                    header('location: index.php?controller=guide&action=index');
                    
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
                $dataGuide = $this->guideModel->getGuide(['*'], 'MaHDV', $id);
                $dataTour = $this->tourModel->getAll();
                return $this->view("guide.formUpdateGuide",
                [
                    'dataTour' => $dataTour,
                    'dataGuide' => $dataGuide
                ]);
            }
        }

        public function delete() {
            $id = $_REQUEST['id'] ?? '';

            if(empty($id)) {
                echo "Lỗi";
            } else {
                $img = $this->guideModel->getGuide(['AnhHDV'], 'MaHDV', $id);
                $imgString = $img[0]['AnhHDV'];
                $link = "public/img/guide/{$imgString}";
                if(unlink($link)) {
                    $this->guideModel->deleteGuide($id, 'MaHDV');
                    header('location: index.php?controller=guide&action=index');
                }else {
                    echo "Lỗi xảy ra";
                }
                
            }

        }
    }
?>