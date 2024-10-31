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
            $guides = $this->guideModel->getAll(['*']);
            return $this->view("guide.index",
            [
                'guides' => $guides
            ]);
        }

        public function create() {
            return $this->view("guide.create");
        }

        public function insert() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $TenHDV = $_POST['TenHDV'];
                $SDT = $_POST['SDT'];
                $Email = $_POST['Email'];
                $NgaySinh = $_POST['NgaySinh'];
                $GioiTinh = $_POST['GioiTinh'];
                $Gia = $_POST['Gia'];
                $MoTa = $_POST['MoTa'];
                $DanhGia = $_POST['DanhGia'];
                $message = "";

                if (!isset($_FILES["avatar"]))
                {
                    $message = "Vui lòng upload ảnh avatar!";
                }
                else if ($_FILES["avatar"]['error'] != 0)
                {
                    $message = "Ảnh upload bị lỗi!";
                }
                else {
                    
                $target_dir    = "./public/img/guide/";
                $target_file   = $target_dir . basename($_FILES["avatar"]["name"]);

                $allowUpload   = true;

                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $maxfilesize   = 800000;
                $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
            
                if ($_FILES["avatar"]["size"] > $maxfilesize)
                {
                    $message = "Không được upload ảnh lớn hơn $maxfilesize (bytes)!";
                    $allowUpload = false;
                }

                if (!in_array($imageFileType,$allowtypes ))
                {
                    $message = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF!";
                    $allowUpload = false;
                }

                if ($allowUpload)
                {
                    if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file))
                    {
                        $message = "Có lỗi xảy ra khi upload file!";
                    }
                }
                
                $Anh = basename( $_FILES["avatar"]["name"]);
                $dataGuide = $this->guideModel->insertGuide(
                    ['TenHDV','SDT','Email' ,'NgaySinh' ,'GioiTinh', 'AnhHDV', 'Gia', 'MoTa', 'DanhGia'], 
                    ["'{$TenHDV}'", "'{$SDT}'", "'{$Email}'", "'{$NgaySinh}'", "'{$GioiTinh}'", "'{$Anh}'", "'{$Gia}'", "'{$MoTa}'", "'{$DanhGia}'"]);
    
                if($dataGuide) {
                    header('location: index.php?controller=guide&action=index');
                } else {
                    echo 'lỗi';
                }
                }
            }
        }

        public function update() {
            if(isset($_REQUEST['id'])) {      
                $id = $_REQUEST['id'];

                if(empty(basename( $_FILES["avatarUpdate"]["name"]))) {
                    $img = $this->guideModel->getGuide(['AnhHDV'], 'MaHDV', $id);
                    $Anh = $img[0]->AnhHDV;

                    $this->guideModel->updateGuide(
                        ['TenHDV','SDT','Email' ,'NgaySinh' ,'GioiTinh', 'AnhHDV', 'Gia', 'MoTa', 'DanhGia'],
                        [$_POST['TenHDV'],  $_POST['SDT'], $_POST['Email'],$_POST['NgaySinh'], $_POST['GioiTinh'], $Anh, $_POST['Gia'], $_POST['MoTa'], $_POST['DanhGia']], 
                        'MaHDV', $id);
                    
                    $message = "Cập nhật thông tin hướng dẫn viên ".$id." thành công.";
                    header('location: index.php?controller=guide&action=index&message='.$message.'&code=0');
                } else {
                    $Anh = basename( $_FILES["avatarUpdate"]["name"]);

                    $target_dir    = "./public/img/guide/";
                    $target_file   = $target_dir . basename($_FILES["avatarUpdate"]["name"]);
                    $allowUpload   = true;

                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    $maxfilesize   = 800000;

                    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

                    if ($_FILES["avatarUpdate"]["size"] > $maxfilesize)
                    {
                        $message = "Không được upload ảnh lớn hơn $maxfilesize (bytes)!";
                        header('location: index.php?controller=guide&action=showForm&id='.$id.'&message='.$message.'&code=1');
                    }
                    else if (!in_array($imageFileType,$allowtypes ))
                    {
                        $message = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF!";
                        header('location: index.php?controller=guide&action=showForm&id='.$id.'&message='.$message.'&code=1');
                    }
                    else
                    {
                        if (!move_uploaded_file($_FILES["avatarUpdate"]["tmp_name"], $target_file))
                        {
                            $message = "Có lỗi xảy ra khi upload file!";
                            header('location: index.php?controller=guide&action=showForm&id='.$id.'&message='.$message.'&code=1');
                        }
                        else {
                            $this->guideModel->updateGuide(
                                ['TenHDV','SDT','Email' ,'NgaySinh' ,'GioiTinh', 'AnhHDV', 'Gia', 'MoTa', 'DanhGia'],
                                [$_POST['TenHDV'],  $_POST['SDT'], $_POST['Email'],$_POST['NgaySinh'], $_POST['GioiTinh'], $Anh, $_POST['Gia'], $_POST['MoTa'], $_POST['DanhGia']], 
                                'MaHDV', $id);

                            $message = "Cập nhật thông tin hướng dẫn viên ".$id." thành công.";
                            header('location: index.php?controller=guide&action=index&message='.$message.'&code=0');
                        }
                    }
                }
                exit();
            }
        }
        
        public function showForm() {
            if(isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];

                $guides = $this->guideModel->getGuide(['*'], 'MaHDV', $id);

                return $this->view("guide.update",
                [
                    'guides' => $guides
                ]);
            }
        }

        public function delete() {
            if(isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];

                $img = $this->guideModel->getGuide(['AnhHDV'], 'MaHDV', $id);
                $imgString = $img[0]->AnhHDV;
                $link = "public/img/guide/{$imgString}";
                if(unlink($link)) {
                    $this->guideModel->deleteGuide($id, 'MaHDV');

                    $message = "Xoá hướng dẫn viên " . $id . " thành công.";
                    header("location: index.php?controller=guide&action=index&message={$message}&code=0");
                }else {
                    $message = "Xoá hướng dẫn viên " . $id . " không thành công!";
                    header("location: index.php?controller=guide&action=index&message={$message}&code=1");
                }
                exit();
            }

        }
    }
?>